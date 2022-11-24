<?php

namespace App\Http\Filters;

use App\Models\AdReport;

class AdReportFilter extends BaseFilters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [
        'ad_id',
        'ad_name',
        'category_name'
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
    /**
     * Filter the query by a given name.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function adName($value)
    {
        if ($value) {
            return $this->builder->whereHas('ad', function ($q) use ($value) {
                $q->whereTranslationLike('name', "%$value%");
            });
        }

        return $this->builder;
    }
    /**
     * Filter the query by a given name.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function categoryName($value)
    {
        if ($value) {
            return $this->builder->whereHas('ad', function ($q) use ($value) {
                $q->whereHas('category',function ($q2) use ($value) {
                    $q2->whereTranslationLike('name', "%$value%");
                });
            });
        }

        return $this->builder;
    }
}
