<?php

namespace App\Policies;

use App\Models\SkillSection;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class SkillSectionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true
            ? Response::allow()
            : Response::deny("You cannot view word suggestions");
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SkillSection  $skillSection
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->is_admin()
            ? Response::allow()
            : Response::deny("You cannot view this skill section");
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->is_admin()
            ? Response::allow()
            : Response::deny('You cannot create a skill section');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SkillSection  $skillSection
     * @return mixed
     */
    public function update(User $user)
    {
        return $user->is_admin()
            ? Response::allow()
            : Response::deny('You cannot edit a skill section');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SkillSection  $skillSection
     * @return mixed
     */
    public function delete(User $user, SkillSection $skillSection)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SkillSection  $skillSection
     * @return mixed
     */
    public function restore(User $user, SkillSection $skillSection)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SkillSection  $skillSection
     * @return mixed
     */
    public function forceDelete(User $user, SkillSection $skillSection)
    {
        //
    }
}
