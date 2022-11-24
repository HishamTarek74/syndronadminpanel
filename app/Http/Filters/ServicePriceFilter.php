<?php

namespace App\Http\Filters;

class ServicePriceFilter extends BaseFilters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [
        'duration',
        'price',
    ];

    /**
     * Filter the query by a given name.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function duration($value)
    {
        if ($value) {
            return $this->builder->whereTranslationLike('duration', "%$value%");
        }

        return $this->builder;
    }

    protected function price($value)
    {
        if ($value) {
            return $this->builder->whereTranslationLike('price', "%$value%");
        }

        return $this->builder;
    }

}
