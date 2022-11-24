<?php

namespace App\Http\Filters;

class ProductFilter extends BaseFilters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [
        'name',
        'category_id',
        'store_id',
        'selected_id'
    ];

    /**
     * Filter the query by a given name.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function name($value)
    {
      //  dd($value);
        if ($value) {
            return $this->builder->where('name', 'like',"%$value%");
        }

        return $this->builder;
    }

    /**
     * Filter the query by a given category id.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function categoryId($value)
    {
        if ($value) {
            $ids = \DB::table('product_category_translations')->where('name', $value)
                ->pluck('product_category_id');
            return $this->builder->whereIn('category_id', $ids);
        }

        return $this->builder;
    }

    /**
     * Filter the query by a given category id.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function storeId($value)
    {
        if ($value) {
            $ids = \DB::table('users')->where(['type'=>'store','type'=>'certified_store'])->where('name', $value)
                ->pluck('id');
            return $this->builder->whereIn('store_id', $ids);
        }

        return $this->builder;
    }


    /**
     * Sorting results by the given id.
     *
     * @param $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function selectedId($value)
    {
        if ($value) {
            $this->builder->sortingByIds($value);
        }

        return $this->builder;
    }
}
