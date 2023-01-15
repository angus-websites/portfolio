<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class RolePolicy
{
    use HandlesAuthorization;
    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Role $role)
    {
        // Block any changes to Super Admin
        if ($role->is_super_admin()){
            return false
                ? Response::allow() 
                : Response::deny('Super Admins cannot be changed');
        }
        // Only Super Admins can update Admins
        if ($role->is_admin()){
            return $user->is_admin(true)
                ? Response::allow()
                : Response::deny('Only Super Admins can update other admins');
        }else{
            return $user->is_admin()
                ? Response::allow()
                : Response::deny('Only Admins can update user roles');
        }

    }

}
