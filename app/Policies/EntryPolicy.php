<?php

namespace App\Policies;

use App\Models\Entry;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class EntryPolicy
{
    use HandlesAuthorization;

    /**
     * Perform pre-authorization checks.
     *
     * @param  \App\Models\User  $user
     * @param  string  $ability
     * @return Response
     */
    public function before(User $user, $ability)
    {
        if ($user->is_admin(true)) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(?User $user)
    {
        return Response::allow();
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Entry  $entry
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(?User $user, Entry $entry)
    {

        return $entry->active ? Response::allow() : abort(404);

    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return Response::deny('You cannot create entries');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Entry  $entry
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Entry $entry)
    {
        return Response::deny('You cannot update entries');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Entry  $entry
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Entry $entry)
    {
        return Response::deny('You cannot delete entries');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Entry  $entry
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Entry $entry)
    {
        return Response::deny('You cannot restore entries');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Entry  $entry
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Entry $entry)
    {
        return Response::deny('You cannot delete entries');
    }
}
