<?php

namespace Tihon\Lesson1\Blog\Repositories\UsersRepository;

use Tihon\Lesson1\Blog\User;
use Tihon\Lesson1\Blog\UUID;

interface UsersRepositoryInterface
{
    public function save(User $user): void;
    public function get(UUID $uuid): User;
    public function getByUsername(string $username): User;
}