<?php

namespace Tihon\Lesson1\Blog\Repositories\UsersRepository;

use Tihon\Lesson1\Blog\Commands\Arguments;
use Tihon\Lesson1\Blog\Commands\CreateUserCommand;
use Tihon\Lesson1\Blog\Exception\InvalidArgumentException;
use Tihon\Lesson1\Blog\Exception\UserNotFoundException;
use Tihon\Lesson1\Blog\User;
use \PDO;
use Tihon\Lesson1\Blog\UUID;
use Tihon\Lesson1\Person\Name;
use \PDOStatement;


class SqliteUsersRepository implements UsersRepositoryInterface
{
    private PDO $connection;
    public function __construct(PDO $connection) {
        $this->connection = $connection;
    }

    public function save(User $user): void
    {
        // Подготавливаем запрос
        $statement = $this->connection->prepare(
            'INSERT INTO users (first_name, last_name, uuid, username) VALUES (:first_name, :last_name, :uuid, :username)'
        );
        // Выполняем запрос с конкретными значениями
        $statement->execute([
            ':first_name' => $user->name()->first(),
            ':last_name' => $user->name()->last(),
            ':uuid' => (string)$user->uuid(),
            ':username' => $user->username(),
        ]);
    }

    /**
     * @throws UserNotFoundException
     * @throws InvalidArgumentException
     */
    public function get(UUID $uuid): User
    {
        $statement = $this->connection->prepare(
            'SELECT * FROM users WHERE uuid = ?'
        );
        $statement->execute([(string)$uuid]);
        //        $result = $statement->fetch(PDO::FETCH_ASSOC);
        //// Бросаем исключение, если пользователь не найден
        //        if ($result === false) {
        //            throw new UserNotFoundException(
        //                "Cannot get user: $uuid"
        //            );
        //        }
        return  $this->getUser($statement, $uuid);
    }

    /**
     * @throws UserNotFoundException
     * @throws InvalidArgumentException
     */
    public function getByUsername(string $username): User
    {
        $statement = $this->connection->prepare(
            'SELECT * FROM users WHERE username = :username'
        );
        $statement->execute([
            ':username' => $username,
        ]);
        return $this->getUser($statement, $username);
    }

    /**
     * @throws UserNotFoundException
     * @throws InvalidArgumentException
     */
    private function getUser(PDOStatement $statement, string $str): User
    {
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        if ($result === false) {
            throw new UserNotFoundException(
                "Cannot find user: $str"
            );
        }
        // Создаём объект пользователя с полем username
        return new User(new UUID($result['uuid']),
            new Name($result['first_name'], $result['last_name']),
            $result['username']
        );
    }


}