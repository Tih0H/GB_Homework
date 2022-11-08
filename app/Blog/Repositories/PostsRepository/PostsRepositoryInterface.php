<?php
namespace Tihon\Lesson1\Blog\Repositories\PostsRepository;

use Tihon\Lesson1\Blog\Post;
use Tihon\Lesson1\Blog\UUID;

interface PostsRepositoryInterface
{
    public function save(Post $user): void;
    public function get(UUID $uuid): Post;

}