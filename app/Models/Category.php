<?php

namespace App\Models;

use App\Http\Filters\Filterable;
use Spatie\MediaLibrary\HasMedia;
use App\Support\Traits\Selectable;
use App\Http\Filters\CategoryFilter;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use AhmedAliraqi\LaravelMediaUploader\Entities\Concerns\HasUploader;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Category extends Model implements TranslatableContract, HasMedia
{
    use HasFactory;
    use Translatable;
    use InteractsWithMedia;
    use Filterable;
    use HasUploader;
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
    protected $fillable = [
        'name',
        'parent_id'
    ];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [
        'translations',
       // 'media'
    ];

    /**
     * The query parameter's filter of the model.
     *
     * @var string
     */
    protected $filter = CategoryFilter::class;

    /**
     * Get category parent
     *
     * @return void
     */
    public function parent()
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategories()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    /**
     * get features
     *
     * @return void
     */
    public function features()
    {
        return $this->hasMany(Feature::class);
    }

    /**
     * Check if category has children
     *
     * @return boolean
     */
    public function hasChildren()
    {
        return $this->parent_id == 0;
    }
}
