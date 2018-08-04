<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Discussion;
use Illuminate\Auth\Access\HandlesAuthorization;

class DiscussionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the discussion.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Discussion  $discussion
     * @return mixed
     */
    public function update(User $user, Discussion $discussion)
    {
        return $user->is_admin || $user->id === $discussion->user_id;
    }

    /**
     * Determine whether the user can delete the discussion.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Discussion  $discussion
     * @return mixed
     */
    public function delete(User $user, Discussion $discussion)
    {
        return $user->is_admin;
    }
}
