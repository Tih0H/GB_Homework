<?php

class TaskProvider
{

    private PDO $pdo;
    public function __construct(PDO $pdo){
        var_dump($pdo);
        $this->pdo = $pdo;
    }
    /**
     * Метод возвращающий массив не выполненных задач из объекта
     * @return array
     */
    public function getUndoneList(int $userId): array
    {
        $statement = $this->pdo->prepare(
            'SELECT * FROM tasks WHERE user_id = :id'
        );
        $statement->execute([
            'id' => $userId,
        ]);
        return $statement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Task::class);
    }

    public function addTask(Task $task, int $userId): bool
    {
//        $_SESSION['tasks'][] = $task;
//        $this->tasks[] = $task;
        $statement = $this->pdo->prepare(
            'INSERT INTO tasks (user_id, description) VALUES (:user_id, :description)'
        );
        return $statement->execute([
            'user_id' => $userId,
            'description' => $task->getDescription()
        ]);
    }

    public function deleteTask(int $key): void
    {
        unset($_SESSION['tasks'][$key]);
        unset($this->tasks[$key]);
    }


}