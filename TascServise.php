<?php
//TaskService должен реализовывать статичный метод addComment(User, Task, text), добавляющий к
// задаче комментарий пользователя. Отношение между классами задачи и комментария должны быть построены по типу
// ассоциация, поэтому необходимо добавить соответствующее свойство и методы классу Task.
class TascServise
{
    private static array $user = [];
    private static array $task = [];
    private static string $text;

    public static function addComment(User $user, Task $task, string $text): void
    {
        self::$user[$user->getFirstName()] = $user;
        self::$task[$task->getDescription()] = $task;
        self::$text = $text;
    }
    public static function getComment(): array
    {
        return [self::$user, self::$task, self::$text];
    }

}