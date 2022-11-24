<?php

namespace App\Http\Filters;

class CategoryFilter extends BaseFilters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [
        'name',
        'parent',
        'selected_id',
    ];

    /**
     * Filter the query by a given name.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function name($value)
    {
        if ($value) {
            return $this->builder->whereTranslationLike('name', "%$value%");
        }

        return $this->builder;
    }

    /**
     * Filter the query by parent id.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function parent($value)
    {
        if ($value == 'main') {
            return $this->builder->where('parent_id', 0);
        }else if($value == 'child') {
            return $this->builder->where('parent_id', '>', 0);
        }else{
            return $this->builder->where('parent_id', $value);
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
