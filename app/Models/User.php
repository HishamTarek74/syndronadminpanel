<?php

namespace App\Models;

use App\Models\Relations\UserRelations;
use Parental\HasChildren;
use App\Http\Filters\Filterable;
use App\Http\Filters\UserFilter;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use App\Support\Traits\Selectable;
use App\Models\Helpers\UserHelpers;
use Spatie\Permission\Traits\HasRoles;
use App\Http\Resources\CustomerResource;
use App\Models\Presenters\UserPresenter;
use Illuminate\Notifications\Notifiable;
use Laracasts\Presenter\PresentableTrait;
use Lab404\Impersonate\Models\Impersonate;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use AhmedAliraqi\LaravelMediaUploader\Entities\Concerns\HasUploader;

class User extends Authenticatable implements HasMedia
{
    use HasFactory, Notifiable,
        UserHelpers, HasChildren,
        InteractsWithMedia, HasApiTokens,
        HasChildren, PresentableTrait,
        Filterable, Selectable,
        HasUploader, Impersonate,
        HasRoles, UserRelations;


    /**
     * The code of admin type.
     *
     * @var string
     */
    const ADMIN_TYPE = 'admin';

    /**
     * The code of supervisor type.
     *
     * @var string
     */
    const SUPERVISOR_TYPE = 'supervisor';

    /**
     * The code of customer type.
     *
     * @var string
     */
    const CUSTOMER_TYPE = 'customer';

    /**
     * The code of seller type.
     *
     * @var string
     */
    const SELLER_TYPE = 'seller';

    /**
     * The code of store type.
     *
     * @var string
     */
    const STORE_TYPE = 'store';

    /**
     * The code of store type.
     *
     * @var string
     */
    const CERTIFIED_STORE_TYPE = 'certified_store';

    /**
     * The guard name of the user permissions.
     *
     * @var string
     */
    protected $guard_name = 'web';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'country_id',
        'owner_id',
        'ban',
        'country_id',
        'gender',
        'remember_token',
        'points',
        'team_id',
        'firebase_id',
        'type'
    ];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['media'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @var array
     */
    protected $childTypes = [
        self::ADMIN_TYPE => Admin::class,
        self::SUPERVISOR_TYPE => Supervisor::class,
        self::CUSTOMER_TYPE => Customer::class, // customer
        self::SELLER_TYPE => Seller::class, // seller man
        self::STORE_TYPE => Store::class, //store
        self::CERTIFIED_STORE_TYPE => CertifiedStore::class, // certified store
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The presenter class name.
     *
     * @var string
     */
    protected $presenter = UserPresenter::class;

    /**
     * The model filter name.
     *
     * @var string
     */
    protected $filter = UserFilter::class;


    public static function boot() {
        parent::boot();

        static::created(function (User $user) {
            Wallet::create([
                'user_id' => $user->id,
            ]);
        });
    }

    /**
     * Get wallet
     *
     * @return void
     */
    public function wallet()
    {
        return $this->hasOne(Wallet::class);
    }
    /**
     * Get the dashboard profile link.
     *
     * @return string
     */
    public function dashboardProfile(): string
    {
        return '#';
    }

    /**
     * Get the number of models to return per page.
     *
     * @return int
     */
    public function getPerPage()
    {
        return request('perPage', parent::getPerPage());
    }

    /**
     * Get the resource for customer type.
     *
     * @return \App\Http\Resources\CustomerResource
     */
    public function getResource()
    {
        return new CustomerResource($this);
    }

    /**
     * Get the access token currently associated with the user. Create a new.
     *
     * @param string|null $device
     * @return string
     */
    public function createTokenForDevice($device = null)
    {
        $device = $device ?: 'Unknown Device';

        $this->tokens()->where('name', $device)->delete();

        return $this->createToken($device)->plainTextToken;
    }

    /**
     * Define the media collections.
     *
     * @return void
     */
    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('avatars')
            ->useFallbackUrl('https://www.gravatar.com/avatar/'.md5($this->email).'?d=mm')
            ->singleFile()
            ->registerMediaConversions(function () {
                $this->addMediaConversion('thumb')
                    ->width(70)
                    ->format('png');

                $this->addMediaConversion('small')
                    ->width(120)
                    ->format('png');

                $this->addMediaConversion('medium')
                    ->width(160)
                    ->format('png');

                $this->addMediaConversion('large')
                    ->width(320)
                    ->format('png');
            });
    }

    /**
     * Determine whither the user can impersonate another user.
     *
     * @return bool
     */
    public function canImpersonate()
    {
        return $this->isAdmin();
    }

    /**
     * Determine whither the user can be impersonated by the admin.
     *
     * @return bool
     */
    public function canBeImpersonated()
    {
        return $this->isSupervisor()|| $this->isOwner();
    }

    public function account_promotions()
    {
        return $this->hasMany(AccountPromotion::class);
    }

    public function current_promotion()
    {
        return $this->hasMany(AccountPromotion::class)->latest()->first();
    }

    public function packageSubscribe()
    {
        return $this->current_promotion()->package;
    }

    public function ads()
    {
        return $this->hasMany(Ad::class);
    }

    public function reviews()
    {
        return $this->hasMany(AdRequestReview::class , 'advertiser_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function latest_comments()
    {
        return $this->hasMany(Comment::class)->latest('created_at')->take(2);
    }

    public function specialAndVipAds()
    {
        return $this->hasMany(Ad::class)->where('type', '<>',Ad::NORMAL_TYPE);
    }

    public function scopeBan($query)
    {
        return $this->ban == 0 ? $query->update(['ban'=>1]) : $query->update(['ban'=>0]);
        //return $query->where('votes', '>', 100);
    }

    /**
     * Get notes
     *
     * @return void
     */
    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    /**
     * Get user orders
     *
     * @return void
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    /*
     * Ticket belongs to employees
     **/
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function scopeAllCustomers($query)
    {
        return $query->whereNot([
//            'type'=>'customer',
//            'type'=>'seller',
//            'type'=>'store',
//           'type'=>'certified_store',
            'type'=>'admin',
            'type'=>'supervisor',
        ]);
    }

    public function scopeAdministrators($query)
    {
        return $query->where('type','admin')->Orwhere('type','supervisor');
    }
}
