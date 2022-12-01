<?php

namespace Tihon\Lesson1\Http\Actions\Posts;

use Tihon\Lesson1\Blog\Repositories\PostsRepository\PostsRepositoryInterface;
use Tihon\Lesson1\Http\Actions\ActionInterface;
use Tihon\Lesson1\http\Response;
use Tihon\Lesson1\http\ErrorResponse;
use Tihon\Lesson1\http\Request;
use Tihon\Lesson1\Blog\Exceptions\HttpException;
use Tihon\Lesson1\Blog\UUID;
use Tihon\Lesson1\Blog\Exceptions\PostNotFoundException;
use Tihon\Lesson1\http\SuccessfulResponse;



class FindByUuid implements ActionInterface
{
    // Нам понадобится репозиторий пользователей,
    // внедряем его контракт в качестве зависимости
    public function __construct(
        private PostsRepositoryInterface $postsRepository
    )
    {
    }



    public function handle(Request $request): Response
    {
        try {
            // Пытаемся получить искомое имя пользователя из запроса
            $postUuid = $request->query('uuid');
        } catch (HttpException $e) {
            // Если в запросе нет параметра username -
            // возвращаем неуспешный ответ,
            // сообщение об ошибке берём из описания исключения
            return new ErrorResponse($e->getMessage());
        }


        try {
            // Пытаемся найти пользователя в репозитории
            $post = $this->postsRepository->get(new UUID($postUuid));
        } catch (PostNotFoundException $e) {
            // Если пользователь не найден -
            // возвращаем неуспешный ответ
            return new ErrorResponse($e->getMessage());
        }


        // Возвращаем успешный ответ
        return new SuccessfulResponse([
            'uuid' => $post->uuid(),
            'post' => "user: ". $post->user()->username() . ', title: ' . $post->title() . ', text: ' . $post->text(),
        ]);
    }
}