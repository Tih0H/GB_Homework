<?php

namespace Tihon\Lesson1\Http\Actions\Posts;

use Tihon\Lesson1\Exceptions\PostNotFoundException;
use Tihon\Lesson1\Blog\Repositories\PostsRepository\PostsRepositoryInterface;
use Tihon\Lesson1\Blog\UUID;
use Tihon\Lesson1\Http\Actions\ActionInterface;
use Tihon\Lesson1\Http\ErrorResponse;
use Tihon\Lesson1\Http\SuccessfulResponse;
use Tihon\Lesson1\http\Request;
use Tihon\Lesson1\http\Response;

class DeletePost implements ActionInterface
{
    public function __construct(
        private PostsRepositoryInterface $postsRepository
    )
    {
    }


    public function handle(Request $request): Response
    {
        try {
            $postUuid = $request->query('uuid');
            $this->postsRepository->get(new UUID($postUuid));

        } catch (PostNotFoundException $error) {
            return new ErrorResponse($error->getMessage());
        }

        $this->postsRepository->delete(new UUID($postUuid));

        return new SuccessfulResponse([
            'uuid' => $postUuid,
        ]);
    }
}