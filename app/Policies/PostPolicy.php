<?php

namespace App\Policies;

use App\PostUser;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;


    public function before($user, $ability)
    {
        if ($user->isSuperAdmin()) {
            return true;
        }
    }

    public function update(User $user)
    {
       // return $user->role === $post->role;
    }

    public function create(User $user)
    {
        return $user->hasAccess(['create']);
    }


    public function delete(User $user, PostUser $post)
    {
        return $user->hasAccess(['update']) or $user->id == $post->user_id;
    }

}
