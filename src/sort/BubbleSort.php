<?php

namespace Tihon\Architecture\sort;

class BubbleSort
{
    public function bubbleSort($arr){
        for($i=0; $i<count($arr); $i++){
            $count = count($arr);
            for($j=$i+1; $j<$count; $j++){
                if($arr[$i]>$arr[$j]){
                    $temp = $arr[$j];
                    $arr[$j] = $arr[$i];
                    $arr[$i] = $temp;
                }
            }
        }
        return $arr;
    }
}