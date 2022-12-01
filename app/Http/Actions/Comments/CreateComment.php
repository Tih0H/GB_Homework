<?php

namespace Tihon\Lesson1\Http\Actions\Comments;

use Tihon\Lesson1\Blog\Exceptions\InvalidArgumentException;
use Tihon\Lesson1\Http\Actions\ActionInterface;
use Tihon\Lesson1\Http\ErrorResponse;
use Tihon\Lesson1\Blog\Exceptions\HttpException;
use Tihon\Lesson1\Http\Request;
use Tihon\Lesson1\Http\Response;
use Tihon\Lesson1\http\SuccessfulResponse;
use Tihon\Lesson1\Blog\Comment;
use Tihon\Lesson1\Blog\Repositories\PostsRepository\PostsRepositoryInterface;
use Tihon\Lesson1\Blog\Exceptions\UserNotFoundException;
use Tihon\Lesson1\Blog\Exceptions\PostNotFoundException;
use Tihon\Lesson1\Blog\Repositories\UsersRepository\UsersRepositoryInterface;
use Tihon\Lesson1\Blog\UUID;
use Tihon\Lesson1\Blog\Repositories\CommentsRepository\CommentsRepositoryInterface;

class CreateComment implements ActionInterface
{
    public function __construct(
        private CommentsRepositoryInterface $commentsRepository,
        private PostsRepositoryInterface $postsRepository,
        private UsersRepositoryInterface $usersRepository,
    ) {
    }
    public function handle(Request $request): Response
    {
        try {
            $authorUuid = new UUID($request->jsonBodyField('author_uuid'));
        } catch (HttpException | InvalidArgumentException $e) {
            return new ErrorResponse($e->getMessage());
        }
        try {
            $user = $this->usersRepository->get($authorUuid);
        } catch (UserNotFoundException $e) {
            return new ErrorResponse($e->getMessage());
        }

        try {
            $postUuid = new UUID($request->jsonBodyField('post_uuid'));
        } catch (HttpException | InvalidArgumentException $e) {
            return new ErrorResponse($e->getMessage());
        }

        try {
            $post = $this->postsRepository->get($postUuid);
        } catch (PostNotFoundException $e) {
            return new ErrorResponse($e->getMessage());
        }

        $newCommentUuid = UUID::random();
        try {
            $comment = new Comment(
                $newCommentUuid,
                $user,
                $post,
                $request->jsonBodyField('text'),
            );
        } catch (HttpException $e) {
            return new ErrorResponse($e->getMessage());
        }
        $this->commentsRepository->save($comment);
        return new SuccessfulResponse([
            'uuid' => (string)$newCommentUuid,
        ]);
    }
}