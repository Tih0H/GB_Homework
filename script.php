<?php
require_once "User.php";
require_once "Task.php";
require_once "Component.php";
require_once "TascServise.php";
//Разработайте класс Task, выполняющий ответственность обычной задачи Todo-списка.
// Класс должен содержать приватные свойства description, dateCreated, dateUpdated, dateDone,
// priority (int), isDone (bool) и обязательное user (User). В качества класса пользователя воспользуйтесь
// разработанным на уроке. Класс Task должен содержать все необходимые для взаимодействия со свойствами методы
// (getters, setters). При вызове метода setDescription обновляйте значение свойства dateUpdated.
// Разработайте метод markAsDone, помечающий задачу выполненной, а также обновляющий свойства dateUpdated и dateDone.
$user = new User('Ivan', 'Ivanov','Ivan@mail.net', 'man', 21);
$task = new Task('testDescription', 1);

//echo $task->setDescriptoin();
//$task->markAsDone();
//var_dump($task);

//Реализуйте два класса: Comment и TaskService. Comment должен содержать свойства author (User), task (Task) и
// text (string). TaskService должен реализовывать статичный метод addComment(User, Task, text), добавляющий к
// задаче комментарий пользователя. Отношение между классами задачи и комментария должны быть построены по типу
// ассоциация, поэтому необходимо добавить соответствующее свойство и методы классу Task.

TascServise::getComment();
?>