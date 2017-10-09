<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function update (User $user)
    {
        return ! $user->isAdmin();
    }

    public function delete (User $user)
    {
        return $user->isAdmin();
    }
}
