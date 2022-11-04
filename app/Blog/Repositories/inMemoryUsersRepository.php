<?php

namespace Tihon\Lesson1\Blog\Repositories;

use Tihon\Lesson1\Blog\Exceptoins\UserNotFoundExceptoin;
use Tihon\Lesson1\Blog\User;

class inMemoryUsersRepository
{
    private array $user = [];
    public function save(User $user): void
    {
        $this->user[] = $user;
    }

    public function get(int $id): User
    {
        foreach ($this->user as $user){
            if ($user->id() === $id){
                return $user;
            }
        }
        throw new UserNotFoundExceptoin("User not found: $id");
    }
}