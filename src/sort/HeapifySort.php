<?php

namespace Tihon\Architecture\sort;

class HeapifySort
{
    //Основная функция, выполняющая пирамидальную сортировку
    public function heapifySort(&$arr)
    {
        $countArr = count($arr);
        // Построение кучи (перегруппируем массив)
        for ($i = $countArr / 2 - 1; $i >= 0; $i--) {
            $this->heapify($arr, $countArr, $i);
        }

        //Один за другим извлекаем элементы из кучи
        for ($i = $countArr - 1; $i >= 0; $i--) {
            // Перемещаем текущий корень в конец
            $temp = $arr[0];
            $arr[0] = $arr[$i];
            $arr[$i] = $temp;

            // вызываем процедуру heapify на уменьшенной куче
            $this->heapify($arr, $i, 0);
        }
    }

    // Процедура для преобразования в двоичную кучу поддерева с корневым узлом $i, что является индексом в $arr[]. $countArr - размер кучи
    function heapify(&$arr, $countArr, $i): void
    {
        $largest = $i; // Инициализируем наибольший элемент как корень
        $left = 2 * $i + 1; // левый = 2*i + 1
        $right = 2 * $i + 2; // правый = 2*i + 2

        // Если левый дочерний элемент больше корня
        if ($left < $countArr && $arr[$left] > $arr[$largest]) {
            $largest = $left;
        }

        //Если правый дочерний элемент больше, чем самый большой элемент на данный момент
        if ($right < $countArr && $arr[$right] > $arr[$largest]) {
            $largest = $right;
        }

        // Если самый большой элемент не корень
        if ($largest != $i) {
            $swap = $arr[$i];
            $arr[$i] = $arr[$largest];
            $arr[$largest] = $swap;

            // Рекурсивно преобразуем в двоичную кучу затронутое поддерево
            $this->heapify($arr, $countArr, $largest);
        }
    }
//    /* Вспомогательная функция для вывода на экран массива размера n */
//    function printArray(&$arr)
//    {
//        $countArr = count($arr);
//        for ($i = 0; $i < $countArr; ++$i) {
//            echo($arr[$i] . " ");
//        }
//
//    }
}