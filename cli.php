<?php
require_once __DIR__ . '/vendor/autoload.php';

use Tihon\Lesson1\Blog\User;
use Tihon\Lesson1\Blog\Post;
use Tihon\Lesson1\Person\Name;
use Tihon\Lesson1\Person\Person;
use Tihon\Lesson1\Blog\Comment;

$faker = Faker\Factory::create();
$name = new Name(
    $faker->firstName('female'),
    $faker->lastName()
);
$user = new User(1, $name, "Admin");

$route = $argv[1] ?? null;
switch ($route){
    case "user":
        echo $user;
        break;
    case "post":
        $post = new Post(
          $faker->randomDigitNotNull(),
          $user,
          $faker->realText(rand(50,100))
        );
        echo $post;
        break;
    case "comment":
        $post = new Post(
            $faker->randomDigitNotNull(),
            $user,
            $faker->realText(rand(50,100))
        );
        $comment = new Comment(
            $faker->randomDigitNotNull(),
            $user,
            $post,
            $faker->realText(rand(10,20))
        );
        echo $comment;
        break;
    default:
        echo "error try user post comment";
}

