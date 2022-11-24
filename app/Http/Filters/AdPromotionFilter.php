<?php

namespace App\Http\Filters;

use App\Models\Ad;

class AdPromotionFilter extends BaseFilters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [
        'name',
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
            $adsIds = Ad::where('name', 'like' ,"%$value%")->pluck('id');

            return $this->builder->whereIn('ad_id', $adsIds);
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
