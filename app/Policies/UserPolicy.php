<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the current user can update the user.
     *
     * @param  \App\Models\User  $currentUser
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function update(User $currentUser, User $user)
    {
        return $currentUser->id === $user->id;
    }

    /**
     * Determine whether the current user can delete the user.
     *
     * @param  \App\Models\User  $currentUser
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function delete(User $currentUser, User $user)
    {
        return $currentUser->is_admin;
    }
}
