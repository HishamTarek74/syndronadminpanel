<?php

namespace App\Http\Filters;

use App\Models\Ad;

class AdFilter extends BaseFilters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [
        'name',
        'category_id',
        'country_id',
        'city_id',
        'area_id',
        'type',
        'price_from',
        'price_to',
        'newest',
        'day',
        'month',
        'year',
        'six_months',
        'from',
        'to',
        'range',
        'selected_id',
        'status',
        'option_id',

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

    protected function day($value)
    {
        if ($value) {
            return $this->builder->where('created_at', '>', \Carbon\Carbon::now()->subDays(1)->toDateTimeString());
        }

        return $this->builder;
    }

    protected function month($value)
    {
        if ($value) {
            return $this->builder->where('created_at', '>', \Carbon\Carbon::now()->subDays(30)->toDateTimeString());
        }

        return $this->builder;
    }

    protected function sixMonths($value)
    {
        if ($value) {
            return $this->builder->where('created_at', '>', \Carbon\Carbon::now()->subMonths(6)->toDateTimeString());
        }

        return $this->builder;
    }

    protected function year($value)
    {
        if ($value) {
            return $this->builder->where('created_at', '>', \Carbon\Carbon::now()->subYears(1)->toDateTimeString());
        }

        return $this->builder;
    }

    /**
     * Filter the query by a given from date.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function from($value)
    {
        if ($value) {
            $days = Ad::where('created_at', '>=', $value)->pluck('id');

            return $this->builder->whereIn('created_at', $days);
        }

        return $this->builder;
    }

    /**
     * Filter the query to include reservations by to date.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function to($value)
    {
        if ($value) {
            $days = Ad::where('created_at', '<=', $value)->pluck('id');

            return $this->builder->whereIn('created_at', $days);
        }

        return $this->builder;
    }

    /**
     * Filter the query to include reservations by date range.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function range($value)
    {
        if ($value) {
            $limits = explode('-', $value);
            $from = trim(str_replace('-', '/', $limits[0]), ' ');
            $to = trim(str_replace('-', '/', $limits[1]), ' ');

            return $this->builder->where('created_at', '>=', $from)
                ->where('created_at', '<=', $to);
        }

        return $this->builder;
    }

    /**
     * Filter the query by newest.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function newest($value)
    {
        if ($value) {
            return $this->builder->sortDesc();
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
            return $this->builder->where('category_id', $value);
        }

        return $this->builder;
    }

    /**
     * Filter the query by a given country id.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function countryId($value)
    {
        if ($value) {
            return $this->builder->where('country_id', $value);
        }

        return $this->builder;
    }

    /**
     * Filter the query by a given city id.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function cityId($value)
    {
        if ($value) {
            return $this->builder->where('city_id', $value);
        }

        return $this->builder;
    }

    /**
     * Filter the query by a given area id.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function areaId($value)
    {
        if ($value) {
            return $this->builder->where('area_id', $value);
        }

        return $this->builder;
    }

    /**
     * Filter the query by a given price from.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function priceFrom($value)
    {
        if ($value) {
            return $this->builder->where('price', '>=', $value);
        }

        return $this->builder;
    }

    /**
     * Filter the query by a given price to.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function priceTo($value)
    {
        if ($value) {
            return $this->builder->where('price', '<=', $value);
        }

        return $this->builder;
    }

    /**
     * Filter the query by a given type.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function type($value)
    {
        if ($value) {
            return $this->builder->where('type', $value);
        }

        return $this->builder;
    }

    /**
     * Filter the query by status.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function status($value)
    {
        if ($value == 0) {
            return $this->builder->where('status', 0);
        } else if ($value == 1) {
            return $this->builder->where('status', 1);
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

    /**
     * Filter the query by a given option id.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function optionId($value)
    {
        $optonsIds = explode('-',$value);
        if ($value) {
            return $this->builder
                ->join('ads_selections', 'ads_selections.ad_id', '=', 'ads.id')
                ->whereIn('ad_id', $optonsIds);
        }

        return $this->builder;
    }
}
