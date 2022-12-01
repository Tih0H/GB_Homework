<?php

namespace Tihon\Lesson1\Http\Actions\Posts;

use Tihon\Lesson1\Blog\Exception\InvalidArgumentException;
use Tihon\Lesson1\Http\Actions\ActionInterface;
use Tihon\Lesson1\Http\ErrorResponse;
use Tihon\Lesson1\Blog\Exception\HttpException;
use Tihon\Lesson1\Http\Request;
use Tihon\Lesson1\Http\Response;
use Tihon\Lesson1\http\SuccessfulResponse;
use Tihon\Lesson1\Blog\Post;
use Tihon\Lesson1\Blog\Repositories\PostsRepository\PostsRepositoryInterface;
use Tihon\Lesson1\Blog\Exception\UserNotFoundException;
use Tihon\Lesson1\Blog\Repositories\UsersRepository\UsersRepositoryInterface;
use Tihon\Lesson1\Blog\UUID;

class CreatePost implements ActionInterface
{
// Внедряем репозитории статей и пользователей
    public function __construct(
        private PostsRepositoryInterface $postsRepository,
        private UsersRepositoryInterface $usersRepository,
    ) {
    }
    public function handle(Request $request): Response
    {
// Пытаемся создать UUID пользователя из данных запроса
        try {
            $authorUuid = new UUID($request->jsonBodyField('author_uuid'));
        } catch (HttpException | InvalidArgumentException $e) {
            return new ErrorResponse($e->getMessage());
        }
// Пытаемся найти пользователя в репозитории
        try {
            $user = $this->usersRepository->get($authorUuid);
        } catch (UserNotFoundException $e) {
            return new ErrorResponse($e->getMessage());
        }
// Генерируем UUID для новой статьи
        $newPostUuid = UUID::random();
        try {
// Пытаемся создать объект статьи
// из данных запроса
            $post = new Post(
                $newPostUuid,
                $user,
                $request->jsonBodyField('title'),
                $request->jsonBodyField('text'),
            );
        } catch (HttpException $e) {
            return new ErrorResponse($e->getMessage());
        }
// Сохраняем новую статью в репозитории
        $this->postsRepository->save($post);
// Возвращаем успешный ответ,
// содержащий UUID новой статьи
        return new SuccessfulResponse([
            'uuid' => (string)$newPostUuid,
        ]);
    }
}