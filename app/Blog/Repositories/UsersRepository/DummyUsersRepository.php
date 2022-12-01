<?php

namespace Tihon\Lesson1\Blog\Repositories\UsersRepository;

use Tihon\Lesson1\Blog\Exception\UserNotFoundException;
use Tihon\Lesson1\Blog\Repositories\UsersRepository\UsersRepositoryInterface;
use Tihon\Lesson1\Blog\User;
use Tihon\Lesson1\Blog\UUID;
use Tihon\Lesson1\Person\Name;

class DummyUsersRepository implements UsersRepositoryInterface
{

    public function save(User $user): void
    {
        // TODO: Implement save() method.
    }

    public function get(UUID $uuid): User
    {
        throw new UserNotFoundException("Not found");
    }

    public function getByUsername(string $username): User
    {
        return new User(UUID::random(),  new Name("first", "last"), "user123");
    }
}