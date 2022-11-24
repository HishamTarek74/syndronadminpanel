<?php

namespace App\Http\Filters;

class CommentReportFilter extends BaseFilters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [
        'ad_id',
    ];

    /**
     * Filter the query by a given name.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function adId($value)
    {
        if ($value) {
            return $this->builder->where('ad_id', $value);
        }

        return $this->builder;
    }
}
