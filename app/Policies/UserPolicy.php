<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    use HandlesAuthorization;



    /**
     * Perform pre-authorization checks.
     * TODO UNCOMMENT WHEN READY
     *
     * @param  \App\Models\User  $user
     * @param  string  $ability
     * @return void|bool
     */
    public function before(User $user, $ability)
    {
        if ($user->is_admin(true) && !in_array($ability, ["update", "delete"])) {
            return true;
        }
    }

    private function protect_super_admins(User $user, User $model, $message)
    {
        /**
         * Super admins should be protected from being
         * deleted and updated but should be able to edit and
         * delete everyone else
         */
        
        if($model->is_admin(true) && $user->is_admin()){
            return Response::deny("Super Admins cannot be $message ");
        }
        elseif($user->is_admin()){
            if(! ($model->is_admin() && $model->id != $user->id) || $user->is_admin(true)){
                return Response::allow();
            }
            return Response::deny("Admins cannot $message other admins");
        }
        return Response::deny("You cannot $message this user");
        

    }
    
    public function manage(User $user)
    {
        /**
         * Can a user manage users?
         */
        
        return $user->is_admin()
            ? Response::allow()
            : Response::deny('You cannot manage users');

    }

    public function viewAccount(User $user)
    {
        /**
         * Can this user view their account
         * details
         */
        return Response::allow();
    }

    public function updateAccount(User $user)
    {
        /**
         * Can this user update their account
         * details
         */
        return Response::allow();
    }



    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->is_admin()
            ? Response::allow()
            : Response::deny('You cannot view all users');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, User $model)
    {
        if($user->is_admin() && !$model->is_admin(true)){
           return Response::allow();
        }
        return Response::deny('You cannot view this user');
        
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return Response::deny('You cannot create new users');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, User $model)
    {
        return $this->protect_super_admins($user, $model, "update");
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, User $model)
    {
        return $this->protect_super_admins($user, $model, "delete");
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, User $model)
    {
        return Response::deny('You cannot restore this users');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, User $model)
    {
        return Response::deny('You cannot force delete this users');
    }
}
