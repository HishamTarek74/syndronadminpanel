<?php

namespace App\Http\Filters;

class PointFilter extends BaseFilters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [
        'action',
        'selected_id',
    ];

    /**
     * Filter the query by a given action.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function action($value)
    {
        if ($value) {
            return $this->builder->where('action', 'like', "%$value%");
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
