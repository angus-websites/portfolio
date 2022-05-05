<?php

namespace App\Policies;

use App\Models\Education;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class EducationPolicy
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
        return Response::deny('You cannot all Education');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Education $education)
    {
        return Response::deny('You cannot this Education');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return Response::deny('You cannot create new Education');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Education $education)
    {
        return Response::deny('You cannot update this Education');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Education $education)
    {
        return Response::deny('You cannot delete this Education');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Education $education)
    {
        return Response::deny('You cannot restore this Education');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Education $education)
    {
        return Response::deny('You cannot force delete Education');
    }
}
