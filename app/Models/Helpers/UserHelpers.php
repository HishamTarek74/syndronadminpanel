<?php

namespace App\Models\Helpers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Gate;

trait UserHelpers
{
    /**
     * Determine whether the user type is admin.
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->type == User::ADMIN_TYPE;
    }

    /**
     * Determine whether the user type is supervisor.
     *
     * @return bool
     */
    public function isSupervisor()
    {
        return $this->type == User::SUPERVISOR_TYPE;
    }

    /**
     * Determine whether the user type is customer.
     *
     * @return bool
     */
    public function isCustomer()
    {
        return $this->type == User::CUSTOMER_TYPE;
    }

    /**
     * Determine whether the user type is manager.
     *
     * @return bool
     */
//    public function isManager()
//    {
//        return $this->type == User::MANAGER_TYPE;
//    }

    /**
     * Determine whether the user type is Seller.
     *
     * @return bool
     */
    public function isSeller()
    {
        return $this->type == User::SELLER_TYPE;
    }

    /**
     * Determine whether the user type is store.
     *
     * @return bool
     */
    public function isStore()
    {
        return $this->type == User::STORE_TYPE;
    }

    /**
     * Determine whether the user type is isCertificatedStore.
     *
     * @return bool
     */
    public function isCertificatedStore()
    {
        return $this->type == User::CERTIFIED_STORE_TYPE;
    }
    /**
     * Set the user type.
     *
     * @return $this
     */
    public function setType($type)
    {
        if (Gate::allows('updateType', $this)
            && in_array($type, array_keys(trans('users.types')))) {
            $this->forceFill([
                'type' => $type,
            ])->save();
        }

        $role = Role::where('name', $type)->first();

        $this->assignRole($role);

        return $this;
    }

    /**
     * get the user type.
     *
     * @return $this
     */
    public function getType()
    {
        return trans('users.types.' . $this->type);
    }

    /**
     * Determine whether the user can access dashboard.
     *
     * @return bool
     */
    public function canAccessDashboard()
    {
        return $this->isAdmin() || $this->isSupervisor();
    }

    /**
     * The user profile image url.
     *
     * @return bool
     */
    public function getAvatar()
    {
        return $this->getFirstMediaUrl('avatars');
    }

    /**
     * set Active Status.
     */
    public function setActiveStatus()
    {
        $this->forceFill(['active' => $this->active == 1 ? 0 : 1])->save();
    }


}
