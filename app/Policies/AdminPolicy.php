<?php

namespace App\Policies;

use App\Models\User;
// use App\Models\odel=Sport;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->email === 'admin@sportsmvp.com';
    }
}
