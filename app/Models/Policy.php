<?php

namespace App\Models;

use App\Http\Filters\Filterable;
use App\Support\Traits\Selectable;
use App\Http\Filters\PolicyFilter;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Policy extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;
    use Filterable;
    use Selectable;
    use SoftDeletes;

    /**
     * The translated attributes that are mass assignable.
     *
     * @var array
     */
    public $translatedAttributes = ['name'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'shop_category_id'];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [
        'translations',
    ];

    public function shop_category()
    {
        return $this->belongsTo(ShopCategory::class);
    }

    /**
     * The query parameter's filter of the model.
     *
     * @var string
     */
    protected $filter = PolicyFilter::class;
}
