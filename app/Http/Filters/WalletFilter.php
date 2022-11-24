<?php

namespace App\Http\Filters;

use App\Models\User;

class WalletFilter extends BaseFilters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [
        'user_id',
        'member_no',
        'email',
        'selected_id',
    ];

    public function memberNo($value){
        if ($value) {
            return $this->builder->where('user_id', $value);
        }

        return $this->builder;
    }

    protected function email($value)
    {
        $user = User::where('email',$value)->first();
        if ($value) {
            return $this->builder->where('user_id', $user->id??'');
        }

        return $this->builder;
    }


    protected function userId($value)
    {
        $user = User::where('name',$value)->first();
        if ($value) {
            return $this->builder->where('user_id', $user->id??'');
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
