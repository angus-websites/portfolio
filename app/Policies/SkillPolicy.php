<?php

namespace App\Policies;

use App\Models\Skill;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class SkillPolicy
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
        return Response::deny('You cannot view Skills');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Skill  $skill
     * @return mixed
     */
    public function view(User $user, Skill $skill)
    {
        return Response::deny('You cannot view this Skill');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return Response::deny('You cannot view this Skill');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Skill  $skill
     * @return mixed
     */
    public function update(User $user)
    {
        return Response::deny('You cannot update Skills');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Skill  $skill
     * @return mixed
     */
    public function delete(User $user)
    {
        return Response::deny('You cannot delete Skills');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Skill  $skill
     * @return mixed
     */
    public function restore(User $user, Skill $skill)
    {
        return Response::deny('You cannot restore Skills');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Skill  $skill
     * @return mixed
     */
    public function forceDelete(User $user, Skill $skill)
    {
        return Response::deny('You cannot force delete Skills');
    }
}
