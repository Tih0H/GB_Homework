<?php

use Tihon\Architecture\Decorators\christmasEmailBody;
use Tihon\Architecture\Decorators\newYearEmailBody;
use Tihon\Architecture\Libs\CircleAreaLib;
use Tihon\Architecture\Libs\SquareAreaLib;
use Tihon\Architecture\Services\eMail;

function load($className): void
{
    var_dump($className);
    $file = $className . ".php";
    $nameSpace = "Tihon\Architecture";
    $file = str_replace($nameSpace, "src", $file);
    $file = str_replace("\\", "/", $file);
    $file = str_replace("_", "/", $file);
    if (file_exists($file)) {
        var_dump($file);
        include $file;
    }
};

//1. Реализовать на PHP пример Декоратора, позволяющий отправлять уведомления
//несколькими различными способами (описан в этой методичке).

$email = new eMail();
$email = new christmasEmailBody($email);
$email = new newYearEmailBody($email);
$email->loadBody();

//2. Реализовать паттерн Адаптер для связи внешней библиотеки (классы SquareAreaLib и
//CircleAreaLib) вычисления площади квадрата (getSquareArea) и площади круга
//(getCircleArea) с интерфейсами ISquare и ICircle имеющегося кода. Примеры классов даны
//ниже. Причём во внешней библиотеке используются для расчётов формулы нахождения через
//диагонали фигур, а в интерфейсах квадрата и круга — формулы, принимающие значения
//одной стороны и длины окружности соответственно.

$service = new AreaCalculationService(new CircleAreaLib(), new SquareAreaLib());

echo $service->circleArea(10) . PHP_EOL;
echo $service->squareArea(5) . PHP_EOL;