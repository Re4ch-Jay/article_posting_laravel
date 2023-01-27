<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function delete(User $user, Post $post) {
        return $user->id === $post->user_id ? Response::allow() : Response::deny('You do not own this post.');
    }
}
