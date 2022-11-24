<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Policy;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Database\Eloquent\SoftDeletes;

class PolicyPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any policies.
     *
     * @param \App\Models\User|null $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('Policies list');
    }

    /**
     * Determine whether the user can view the policy.
     *
     * @param \App\Models\User|null $user
     * @param \App\Models\Policy $policy
     * @return mixed
     */
    public function view(User $user, Policy $policy)
    {
        return $user->isAdmin() || $user->hasPermissionTo('Policies show');
    }

    /**
     * Determine whether the user can create policies.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('Policies create');
    }

    /**
     * Determine whether the user can update the policy.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Policy $policy
     * @return mixed
     */
    public function update(User $user, Policy $policy)
    {
        return $user->isAdmin() || $user->hasPermissionTo('Policies update');
    }

    /**
     * Determine whether the user can delete the policy.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Policy $policy
     * @return mixed
     */
    public function delete(User $user, Policy $policy)
    {
        return $user->isAdmin() || $user->hasPermissionTo('Policies delete');
    }

     /**
     * Determine whether the user can view trashed policies.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function viewTrash(User $user)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('Policies delete')) && $this->hasSoftDeletes();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\policy $Policy
     * @return mixed
     */
    public function restore(User $user, policy $Policy)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('Policies delete')) && $this->trashed($Policy);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\policy $Policy
     * @return mixed
     */
    public function forceDelete(User $user, policy $Policy)
    {
        return ($user->isAdmin()  || $user->hasPermissionTo('Policies delete')) && $this->trashed($Policy);
    }

    /**
     * Determine wither the given Policy is trashed.
     *
     * @param $Policy
     * @return bool
     */
    public function trashed($Policy)
    {
        return $this->hasSoftDeletes() && method_exists($Policy, 'trashed') && $Policy->trashed();
    }

    /**
     * Determine wither the model use soft deleting trait.
     *
     * @return bool
     */
    public function hasSoftDeletes()
    {
        return in_array(
            SoftDeletes::class,
            array_keys((new \ReflectionClass(Policy::class))->getTraits())
        );
    }
}
