<?php

namespace App\Support\Traits;

use App\Models\User;

trait Favourable
{
    /**
     * Determine if the relation has been favourite by a specific user.
     *
     * @param  User|null  $user
     * @param $relation
     * @return bool
     */
    public function favouriteBy(?User $user,$relation): bool
    {
        if (is_null($user)) {
            return false;
        }

        return $relation->where('user_id', $user->id)->exists();
    }
}
