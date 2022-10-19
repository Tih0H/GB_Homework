<?php
include_once "model/Task.php";
include_once "model/TaskProvider.php";
include_once "model/User.php";

$pdo = require 'db.php';//

session_start();

$pageHeader = "Задачи";

//Получаем текущего пользователя, если он залогинен
$username = null;
if (isset($_SESSION['user'])) {
    $username = $_SESSION['user']->getUsername();
} else {
    //Перенаправим на главную если пользователь не залогинен
    header("Location: /");
    die();
}
$taskProvider = new TaskProvider($pdo);

$user_id = $_SESSION['id'];

//Сделаем метод добавления новой задачи и сохранения ее в сессии
if (isset($_GET['action']) && $_GET['action'] === 'add') {
    $taskText = strip_tags($_POST['task']);
    $taskProvider->addTask(new Task($taskText), $user_id);
    header("Location: /?controller=tasks");
    die();
}

if (isset($_GET['action']) && $_GET['action'] === 'done') {
    $key = $_GET['key'];
    $taskProvider->deleteTask($key);
    header("Location: /?controller=tasks");
    die();
}


$tasks = $taskProvider->getUndoneList($user_id);
include "view/tasks.php";