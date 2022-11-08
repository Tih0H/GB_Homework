<?php

namespace Tihon\Lesson1\Blog\Repositories\UsersRepository;

use Tihon\Lesson1\Blog\Exception\UserNotFoundException;
use Tihon\Lesson1\Blog\User;
use Tihon\Lesson1\Blog\UUID;

class InMemoryUsersRepository implements UsersRepositoryInterface
{
    private array $users = [];
    public function save(User $user): void
    {
        $this->users[] = $user;
    }
    // Заменили int на UUID
    public function get(UUID $uuid): User
    {
        foreach ($this->users as $user) {
    // Сравниваем строковые представления UUID
            if ((string)$user->uuid() === (string)$uuid) {
                return $user;
            }
        }
        throw new UserNotFoundException("User not found: $uuid");
    }

    /**
     * @throws UserNotFoundException
     */
    public function getByUsername(string $str): User
    {
        foreach ($this->users as $user) {
            if ($user->username() === $str) {
                return $user;
            }
        }
        throw new UserNotFoundException("User not found: $str");
    }
}