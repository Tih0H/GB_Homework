<?php

use Tihon\Lesson1\Blog\Commands\Arguments;
use Tihon\Lesson1\Blog\Commands\CreateUserCommand;
use Tihon\Lesson1\Blog\Post;
use Tihon\Lesson1\Blog\Repositories\PostsRepository\SqlitePostsRepository;
use Tihon\Lesson1\Blog\UUID;
use Tihon\Lesson1\Person\Name;
use Tihon\Lesson1\Blog\Repositories\UsersRepository\SqliteUsersRepository;
use Tihon\Lesson1\Blog\User;

require_once __DIR__ . '/vendor/autoload.php';

$connection = new PDO('sqlite:' . __DIR__ . '/blog.sqlite');

//Создаём объект репозитория
$usersRepository = new SqliteUsersRepository($connection);
$postsRepository = new SqlitePostsRepository($connection);

//Добавляем в репозиторий несколько пользователей
//$usersRepository->save(new User(UUID::random(), new Name('Ivan', 'Nikitin'), "Admin"));

try {
    $user = $usersRepository->get(new UUID('b44c3a12-4b45-4387-85ef-d292c9330093'));
    print_r($user);
    //$post = new Post(
    //    UUID::random(),
    //    $user,
    //    'Тестовый заголовок',
    //    'Тестовое описание'
    //);
    //    $postsRepository->save($post);
    $post = $postsRepository->get(new UUID('6507e105-3cf4-49ef-a032-f1d30e176fdb'));
    print_r($post);
    } catch (Exception $e) {
        echo $e->getMessage();
}
//$command = new CreateUserCommand($usersRepository);
//try {
//    $command->handle((Arguments::fromArgv($argv)));
////    $usersRepository->save(new User(UUID::random(), new Name('Ivan', 'Nikitin'), "Admin"));
////    echo $usersRepository->getByUsername('Admin');
//} catch (Exception $e) {
//    echo $e->getMessage();
//}

//php cli.php username=ivan first_name=Ivan last_name=Nikitin