<?php

namespace Tihon\Lesson1\Blog\Commands;

use Tihon\Lesson1\Blog\Exception\ArgumentsException;
use Tihon\Lesson1\Blog\Exception\CommandException;
use Tihon\Lesson1\Blog\Exception\UserNotFoundException;
use Tihon\Lesson1\Blog\Repositories\UsersRepository\UsersRepositoryInterface;
use Tihon\Lesson1\Blog\User;
use Tihon\Lesson1\Blog\UUID;
use Tihon\Lesson1\Person\Name;

class CreateUserCommand
{
    // Команда зависит от контракта репозитория пользователей,
    // а не от конкретной реализации
    public function __construct(
        private UsersRepositoryInterface $usersRepository
    )
    {
    }

    /**
     * @throws CommandException
     * @throws ArgumentsException
     */
    public function handle(Arguments $arguments): void
    {
        $username = $arguments->get('username');

    // Проверяем, существует ли пользователь в репозитории
        if ($this->userExists($username)) {
    // Бросаем исключение, если пользователь уже существует
            throw new CommandException("User already exists: $username");
        }
        // Сохраняем пользователя в репозиторий
        $this->usersRepository->save(new User(
            UUID::random(),
            new Name($arguments->get('first_name'), $arguments->get('last_name')),
            $username,
        ));
    }
    private function userExists(string $username): bool
    {
        try {
    // Пытаемся получить пользователя из репозитория
            $this->usersRepository->getByUsername($username);
        } catch (UserNotFoundException) {
            return false;
        }
        return true;
    }

}