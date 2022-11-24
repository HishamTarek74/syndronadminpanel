<?php

namespace App\Http\Filters;

class SliderFilter extends BaseFilters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [
        'name',
        'url',
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
     * Filter the query by a given url.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function url($value)
    {
        if ($value) {
            return $this->builder->where('url', 'LIKE', '%' .$value. '%');
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
