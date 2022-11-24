<?php

namespace App\Http\Filters;

use App\Models\Order;
use Carbon\Carbon;

class OrderFilter extends BaseFilters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [
        'range',
        'day',
        'month',
        'year',
        'six_months',
        'from',
        'to',
        'order_no',
        'user'
    ];

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
            $days = Order::where('created_at', '>=', $value)->pluck('id');

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
            $days = Order::where('created_at', '<=', $value)->pluck('id');

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
     * Filter the query by a given name.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function orderNo($value)
    {
        if ($value) {
            return $this->builder->where('order_no', $value);
        }
        return $this->builder;
    }

    protected function user($value)
    {
        if ($value) {
           $ids = \App\Models\User::where('name', 'like', $value)->pluck('id');

            return $this->builder->whereIn('user_id', $ids);
        }

        return $this->builder;
    }
}
