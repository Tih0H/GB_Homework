<?php
//задание 1
$arrey1 = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$arrey2 = [11, 12, 13, 14, 15, 16, 17, 18, 19, 20];
$arreyAns = [];
for ($index = 0; $index < count($arrey1); $index++) {
    array_push($arreyAns, $arrey1[$index] + $arrey2[$index]);
}
print_r($arreyAns);
//задание 2
?>