<?php

namespace Tihon\Lesson1\Http\Actions\Users;

use Tihon\Lesson1\Blog\Exception\HttpException;
use Tihon\Lesson1\Blog\Repositories\UsersRepository\UsersRepositoryInterface;
use Tihon\Lesson1\Blog\User;
use Tihon\Lesson1\Blog\UUID;
use Tihon\Lesson1\http\Actions\ActionInterface;
use Tihon\Lesson1\http\ErrorResponse;
use Tihon\Lesson1\http\Request;
use Tihon\Lesson1\http\Response;
use Tihon\Lesson1\http\SuccessfulResponse;
use Tihon\Lesson1\Person\Name;

class CreateUser implements ActionInterface
{
    public function __construct(
        private UsersRepositoryInterface $usersRepository,
    ) {
    }

    public function handle(Request $request): Response
    {
        try {
            $newUserUuid = UUID::random();

            $user = new User(
                $newUserUuid,
                new Name(
                    $request->jsonBodyField('first_name'),
                    $request->jsonBodyField('last_name')
                ),
                $request->jsonBodyField('username')
            );

        } catch (HttpException $e) {
            return new ErrorResponse($e->getMessage());

        }

        $this->usersRepository->save($user);

        return new SuccessfulResponse([
            'uuid' => (string)$newUserUuid,
        ]);
    }

}