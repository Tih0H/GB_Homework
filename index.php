<?php
// 1. Реализовать построение и обход дерева для математического выражения.

use Tihon\Architecture\Calculation\Main;

spl_autoload_register('load');
function load($className)
{
//    var_dump($className);
    $file = $className . ".php";
    $nameSpace = "Tihon\Architecture";
    $file = str_replace($nameSpace, "src", $file);
    $file = str_replace("\\", "/", $file);
    $file = str_replace("_", "/", $file);
    if (file_exists($file)) {
//        var_dump($file);
        include $file;
    }
};

// server start command: php -S localhost:8080 index.php

// задаем исходное математическое выражение
$str = "(x+14)^2+3*y-z";
$x = 10;
$y = 6;
$z = 7;

$parse = new Main();

// строительство дерева классов
$parse->builder($str);

// вформирования древовидной структуры
echo '<pre>';
echo print_r($parse->arNode);
echo '</pre>';

echo $str . " = " . $parse->calc($x, $y, $z);

echo " при: x=" . $x . "; y=" . $y . "; z=" . $z;
