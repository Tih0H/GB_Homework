<?php

function linearSearch($myArray, $num)
{

    $arrCount = count($myArray);
    $n = 0;

    for ($i = 0; $i < $arrCount; $i++) {
        $n++;
        echo "Проверяется число с индексом: $i" . PHP_EOL;

        if ($myArray[$i] == $num) {
            echo "ЧИСЛО НАЙДЕНО! Количество итераций: $n индекс $i" . PHP_EOL;
            return $i;
        } elseif ($myArray[$i] > $num) {
            return null;
        }
    }
}