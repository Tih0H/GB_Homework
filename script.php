<?php
//«В каком году произошло крещение Руси?». Варианты: 810, 990 или 740 год
$date = readline("Поиграем в угадайку!\n В каком году произошло крещение Руси?. Варианты: 810, 988 или 740 год");

$try_num = 1;

while ($try_num < 10) {
    if($date == 810){
        echo "Вы не угадали";
        break;
    } elseif($date == 988) {
        echo "Вы угадали!!!";
        break;
    } elseif ($date == 740){
        echo "Вы не угадали";
        break;
    } else{
        echo "Вы не выбрали ответ из передоставленных вариантов. \n Давай попробуем еще раз!";
        $date = readline("В каком году произошло крещение Руси?. Варианты: 810, 988 или 740 год");
    }
    $try_num = $try_num + 1;
}

