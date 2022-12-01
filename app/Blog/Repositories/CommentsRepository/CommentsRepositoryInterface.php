<?php

namespace Tihon\Lesson1\Blog\Repositories\CommentsRepository;

use Tihon\Lesson1\Blog\Comment;
use Tihon\Lesson1\Blog\UUID;

interface CommentsRepositoryInterface
{
    public function save(Comment $comment): void;
    public function get(UUID $uuid): Comment;
}