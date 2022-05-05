<?php

namespace App\Policies;

use App\Models\Employment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class EmploymentPolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability)
    {
        if ($user->is_admin()) {
            return true;
        }
    }
    
    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return Response::deny('You cannot view all Employment');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Employment  $employment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Employment $employment)
    {
        return Response::deny('You cannot view this Employment');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return Response::deny('You cannot create new Employment');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Employment  $employment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Employment $employment)
    {
        return Response::deny('You cannot update this Employment');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Employment  $employment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Employment $employment)
    {
        return Response::deny('You cannot delete this Employment');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Employment  $employment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Employment $employment)
    {
        return Response::deny('You cannot restore this Employment');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Employment  $employment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Employment $employment)
    {
        return Response::deny('You cannot force delete this Employment');
    }
}
