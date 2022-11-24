<?php

namespace App\Http\Filters;

use App\Models\User;

class AccountReportFilter extends BaseFilters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [
        'user_name',
    ];

    /**
     * Filter the query by a given name.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function user_name($value)
    {
        $users_ids=User::where('name','like', '%'.$value.'%')->get()->pluck('id')->toArray();

        if ($value) {
            return $this->builder->whereIn('user_id', $users_ids);
        }

        return $this->builder;
    }
}
