<?php

class Component
{
    private User $author;
    private Task $task;
    private string $text;

    public function __construct(User $author, Task $task)
    {
        $this->author = $author;
        $this->task = $task;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): void
    {
        $this->text = $text;
    }

}