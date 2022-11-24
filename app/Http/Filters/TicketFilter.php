<?php

namespace App\Http\Filters;

use App\Models\User;

class TicketFilter extends BaseFilters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [
        'customer',
        'employee',
        'user_type',
        'ticket_type',
        'selected_id',
    ];

    /**
     * Filter the query by a given name.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function customer($value)
    {
        if ($value) {
            $userIds = User::where('name', 'like' ,"$value%")->pluck('id');

            return $this->builder->whereIn('user_id', $userIds);
        }

        return $this->builder;
    }

    protected function employee($value)
    {
        if ($value) {
            $userIds = User::where('name', 'like' ,"$value%")->pluck('id');

            return $this->builder->whereIn('employee_id', $userIds);
        }

        return $this->builder;
    }

    protected function userType($value)
    {
        if ($value) {
            $userIds = User::where('type', 'like' ,"$value%")->pluck('id');
            return $this->builder->whereIn('user_id', $userIds);
        }

        return $this->builder;
    }

    protected function ticketType($value)
    {
        if ($value) {
            return $this->builder->where('type', $value);
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
