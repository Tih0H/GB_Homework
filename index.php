<?php

use Tihon\Architecture\search\BinarySearch;
use Tihon\Architecture\sort\BubbleSort;
use Tihon\Architecture\sort\CombSort;
use Tihon\Architecture\sort\DualSelectSort;
use Tihon\Architecture\sort\HeapifySort;
use Tihon\Architecture\sort\QuickSort;

spl_autoload_register('load');

function load($className): void
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

//Создаем произвольный массив без повтора значений
$arr = range(1, 50000);
shuffle($arr);

//Создаем произвольный массив
//$array = array();
//for ($i = 0; $i < 10; $i++) {
//    $array[]=rand(1,10);
//}

//1. Создать массив на миллион элементов и отсортировать его различными способами. Сравнить
//скорости.

$lastIndex = count($arr) - 1;

$start = microtime(true);
$bubbleSort = new BubbleSort($arr);
echo "Сортировка пузырьком: " . (microtime(true) - $start) . PHP_EOL;

$start = microtime(true);
$quickSort = new QuickSort($arr, 0, $lastIndex);
echo "Сортировка быстрая: " . (microtime(true) - $start) . PHP_EOL;

$start = microtime(true);
$combSort = new CombSort($arr);
echo "Сортировка расческой: " . (microtime(true) - $start) . PHP_EOL;

$start = microtime(true);
$dualSelectSort = new DualSelectSort($arr);
echo "Сортировка выбором: " . (microtime(true) - $start) . PHP_EOL;

$start = microtime(true);
$heapifySort = new HeapifySort($arr);
echo "Сортировка пирамидальная: " . (microtime(true) - $start) . PHP_EOL;

$start = microtime(true);
sort($arr);
echo "Сортировка из PHP: " . (microtime(true) - $start) . PHP_EOL;

/* 2. Реализовать удаление элемента массива по его значению. Обратите внимание на возможные
   дубликаты! */

$array = [1, 12, 15, 45, 342, 324, 15, 53246, 34534, 435, 34623, 15, 1, 15];

function filterArrayByValue($array, $value): array
{
    return array_filter($array, static fn ($item) => $item !== $value);
}
var_dump(filterArrayByValue($array, 15));

//3. Подсчитать практически количество шагов при поиске описанными в методичке алгоритмами.


include 'src/search/LinearSearch.php';
include 'src/search/BinarySearch.php';
include 'src/search/InterpolationSearch.php';

const NUM = 157;

//print_r($arr);

echo "Линейный поиск" . PHP_EOL;
echo linearSearch($arr, NUM) . PHP_EOL;

echo "Бинарный поиск" . PHP_EOL;
echo binarySearch($arr, NUM) . PHP_EOL;

echo "Интерполяционный" . PHP_EOL;
echo interpolationSearch($arr, NUM);