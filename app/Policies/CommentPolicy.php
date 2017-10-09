<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    public function create (User $user)
    {
        return $user->id != 2 && $user->id != 4;
    }
}
