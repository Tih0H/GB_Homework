<?php
require_once 'model/User.php';
session_start();
$pageHeader = 'Добро пожаловать в TODO';

//Получаем текущего пользователя, если он залогинен
$username = null;
if (isset($_SESSION['user'])) {
    $username = $_SESSION['user']->getUsername();
}
//var_dump($_SESSION);
include "view/index.php";