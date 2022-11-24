<?php

namespace App\Http\Filters;

use App\Models\Seller;

class SellerFilter extends BaseFilters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [
        'id',
        'name',
        'type',
        'email',
        'phone',
        'day',
        'month',
        'year',
        'six_months',
        'from',
        'to',
        'range',
        'selected_id',
        'country_id',
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
            return $this->builder->where('name', 'like', "%$value%");
        }

        return $this->builder;
    }

    /**
     * Filter the query by a given name.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function id($value)
    {
        if ($value) {
            return $this->builder->where('id', $value);
        }

        return $this->builder;
    }

    protected function day($value) 
    {
        if ($value) {
            return $this->builder->where('created_at', '>' , \Carbon\Carbon::now()->subDays(1)->toDateTimeString());
        }

        return $this->builder;
    }

    protected function month($value) 
    {
        if ($value) {
            return $this->builder->where('created_at', '>' , \Carbon\Carbon::now()->subDays(30)->toDateTimeString());
        }

        return $this->builder;
    }

    protected function sixMonths($value) 
    {
        if ($value) {
            return $this->builder->where('created_at', '>' , \Carbon\Carbon::now()->subMonths(6)->toDateTimeString());
        }

        return $this->builder;
    }

    protected function year($value) 
    {
        if ($value) {
            return $this->builder->where('created_at', '>' , \Carbon\Carbon::now()->subYears(1)->toDateTimeString());
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
            $days = Seller::where('created_at', '>=', $value)->pluck('id');

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
            $days = Seller::where('created_at', '<=', $value)->pluck('id');

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
     * Filter the query to include users by type.
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
     * Filter the query to include users by email.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function email($value)
    {
        if ($value) {
            return $this->builder->where('email', 'like', "%$value%");
        }

        return $this->builder;
    }

    /**
     * Filter the query to include users by phone.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function phone($value)
    {
        if ($value) {
            return $this->builder->where('phone', 'like', "%$value%");
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
     * Sorting results by the given country id.
     *
     * @param $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function countryId($value)
    {
        if ($value) {
            $this->builder->where('country_id', $value);
        }

        return $this->builder;
    }
}
