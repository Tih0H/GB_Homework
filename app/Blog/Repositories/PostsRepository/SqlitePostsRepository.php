<?php

namespace Tihon\Lesson1\Blog\Repositories\PostsRepository;

use Tihon\Lesson1\Blog\Exception\InvalidArgumentException;
use Tihon\Lesson1\Blog\Exception\PostNotFoundException;
use Tihon\Lesson1\Blog\Exception\UserNotFoundException;
use Tihon\Lesson1\Blog\Post;
use Tihon\Lesson1\Blog\Repositories\UsersRepository\SqliteUsersRepository;
use Tihon\Lesson1\Blog\UUID;

class SqlitePostsRepository implements PostsRepositoryInterface
{
    private \PDO $connection;
    public function __construct(\PDO $connection) {
        $this->connection = $connection;
    }
    public function save(Post $post): void
    {
        $statement = $this->connection->prepare(
            'INSERT INTO posts (uuid, author_uuid, title, text) 
            VALUES (:uuid, :author_uuid, :title, :text)'
        );
        $statement->execute([
            ':uuid' => $post->getUuid(),
            ':author_uuid' => $post->getUser()->uuid(),
            ':title' => (string)$post->getTitle(),
            ':text' => (string)$post->getText(),
        ]);
    }
//ON CONFLICT UPDATE

    /**
     * @throws PostNotFoundException
     * @throws InvalidArgumentException
     */
    public function get(UUID $uuid): Post
    {
        $statement = $this->connection->prepare(
            'SELECT * FROM posts WHERE uuid = :uuid'
        );
        $statement->execute([
            ':uuid' => (string)$uuid
        ]);
        return $this->getPost($statement, $uuid);
    }

    /**
     * @throws PostNotFoundException
     * @throws InvalidArgumentException
     * @throws UserNotFoundException
     */
    private function getPost(\PDOStatement $statement, string $postUuid): Post
    {
        $result = $statement->fetch(\PDO::FETCH_ASSOC);

        if($result === false){
            throw new PostNotFoundException(
                "Cannot find post: $postUuid"
            );
        }
        $userRepository = new SqliteUsersRepository($this->connection);
        $user = $userRepository->get(new UUID($result['author_uuid']));
        return new Post(
            new UUID($result['uuid']),
            $user,
            $result['title'],
            $result['text']
        );
    }

}