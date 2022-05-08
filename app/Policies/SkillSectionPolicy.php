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
     * Perform pre-authorization checks.     *
     * @param  \App\Models\User  $user
     * @param  string  $ability
     * @return void|bool
     */
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
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return Response::deny("You cannot view Skill Sections");
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
        return Response::deny("You cannot view this skill section");
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return Response::deny('You cannot create a skill section');
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
        return Response::deny('You cannot update a skill section');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SkillSection  $skillSection
     * @return mixed
     */
    public function delete(User $user)
    {
        return Response::deny('You cannot delete a skill section');
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
        return Response::deny('You cannot restore a skill section');
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
        return Response::deny('You cannot force delete a skill section');
    }
}
