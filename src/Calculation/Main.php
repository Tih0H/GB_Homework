<?php
namespace Tihon\Architecture\Calculation;

use Tihon\Architecture\Calculation\Plus;
use Tihon\Architecture\Calculation\Minus;
use Tihon\Architecture\Calculation\Multiply;
use Tihon\Architecture\Calculation\Fission;
use Tihon\Architecture\Calculation\Exponent;
use Tihon\Architecture\Calculation\Constant;
use Tihon\Architecture\Calculation\Variable;

class Main
{

    // массив объектов дерева
    var $arNode = array();

    // расчет значения с учетом параметров
    public function calc($x, $y, $z)
    {

        if ($x) {
            foreach ($this->arNode as $obj) {
                if ($obj->const == "x") {
                    $obj->var = $x;
                    break;
                }
            }
        }

        if ($y) {
            foreach ($this->arNode as $obj) {
                if ($obj->const == "y") {
                    $obj->var = $y;
                    break;
                }
            }
        }

        if ($z) {
            foreach ($this->arNode as $obj) {
                if ($obj->const == "z") {
                    $obj->var = $z;
                    break;
                }
            }
        }

        foreach ($this->arNode as $obj) {
            if (!$obj->parent) {
                return $obj->calc();
            }
        }
    }
    // реализация строительства дерева классов
    public function builder($str)
    {

        // массив объектов дерева
        $arNode = array();
        $arLec = $this->parse($str);

        // первая тройка дерева
        $topN = $this->inflPoint($arLec);
        $topP = $arLec[$topN];
        $leftLec = array_slice($arLec, 0, $topN);
        if ($leftLec[0] == "(" && $leftLec[count($leftLec) - 1] == ")") {
            array_shift($leftLec);
            array_pop($leftLec);
        }

        $rightLec = array_slice($arLec, $topN + 1);
        if ($rightLec[0] == "(" && $rightLec[count($rightLec) - 1] == ")") {
            array_shift($rightLec);
            array_pop($rightLec);
        }

        $leftN = $this->inflPoint($leftLec);
        $leftP = $leftLec[$leftN];

        $rightN = $this->inflPoint($rightLec);
        $rightP = $rightLec[$rightN];

        $trio = $this->trioBuilder($arLec, $leftLec, $rightLec, $topP, $leftP, $rightP, NULL);
        $arNode = $trio;

        // все последующие тройки дерева
        while (!$this->stopBuild($arNode)) {
            $topTrio = $this->searchObj($arNode);
            $arLec = $topTrio->lec;
            $topN = $this->inflPoint($arLec);
            $leftLec = array_slice($arLec, 0, $topN);
            if ($leftLec[0] == "(" && $leftLec[count($leftLec) - 1] == ")") {
                array_shift($leftLec);
                array_pop($leftLec);
            }
            $rightLec = array_slice($arLec, $topN + 1);
            if ($rightLec[0] == "(" && $rightLec[count($rightLec) - 1] == ")") {
                array_shift($rightLec);
                array_pop($rightLec);
            }
            $leftN = $this->inflPoint($leftLec);
            $leftP = $leftLec[$leftN];
            $rightN = $this->inflPoint($rightLec);
            $rightP = $rightLec[$rightN];
            $duo = $this->trioBuilder(NULL, $leftLec, $rightLec, NULL, $leftP, $rightP, $topTrio);
            $arNode = array_merge($arNode, $duo);
        }
        $this->arNode = $arNode;
    }
    // предварительные операции с входной строкой
    private function parse($str)
    {

        // подготовка входного выражения к парсингу
        $str = mb_strtolower($str, 'UTF-8');
        $str = str_replace(" ", "", $str);
        $n = mb_strlen($str, 'UTF-8');
        $arStr = preg_split('/(?!^)(?=.)/u', $str);

        echo '<pre>';
        echo '$arStr' . PHP_EOL;
        print_r($arStr);
        echo '</pre>' . PHP_EOL;

        // преобразуем массив символов в массив лексем
        $j = 0;
        $accum = $arStr[0];
        $arLec = [];
        for ($i = 1; $i < $n + 1; $i++) {

            if ($i == $n) {
                echo 'true' . PHP_EOL;
                $arLec[$j] = $accum;
                break;
            }

            if ($accum == "-" && $i == 1) {
                if (preg_match("/\d/", $arStr[$i])) {
                    $accum = $accum . $arStr[$i];
                }
                if ($arStr[$i] == "(") {
                    $arLec[$j] = "0";
                    $arLec[++$j] = "-";
                    ++$j;
                    $accum = $arStr[$i];
                }
                continue;
            }

            if ($accum == "-" && $arLec[$j - 1] == "(") {
                $accum = $accum . $arStr[$i];
                continue;
            }

            if (preg_match("/^[\d.]/", $accum) && preg_match("/^[\d.]/", $arStr[$i])) {
                $accum = $accum . $arStr[$i];
            } else {
                $arLec[$j] = $accum;
                ++$j;
                $accum = $arStr[$i];
            }
        }

        echo '<pre>';
        print_r($arLec);
        echo '</pre>' . PHP_EOL;

        return $arLec;
    }

    // построение одного объекта
    private function objBuilder($point)
    {

        static $arNumNode = array(
            "addition" => 1,
            "subtraction" => 1,
            "exponentiation" => 1,
            "multiplication" => 1,
            "division" => 1,
            "number" => 1,
            "constant" => 1
        );

        switch ($point) {

            case "+":
                $name = "Plus" . $arNumNode["addition"];
                $node = new Plus($name);
                ++$arNumNode["addition"];
                break;

            case "-":
                $name = "Minus" . $arNumNode["subtraction"];
                $node = new Minus($name);
                ++$arNumNode["subtraction"];
                break;

            case "*":
                $name = "Multiply" . $arNumNode["multiplication"];
                $node = new Multiply($name);
                ++$arNumNode["multiplication"];
                break;

            case "/":
                $name = "Fission" . $arNumNode["division"];
                $node = new Fission($name);
                ++$arNumNode["division"];
                break;

            case "^":
                $name = "Exponent" . $arNumNode["exponentiation"];
                $node = new Exponent($name);
                ++$arNumNode["exponentiation"];
                break;

            case "x":
                $name = "Constant" . $arNumNode["constant"];
                $node = new Constant($name);
                $node->const = "x";
                $node->var = 0;
                ++$arNumNode["constant"];
                break;

            case "y":
                $name = "Constant" . $arNumNode["constant"];
                $node = new Constant($name);
                $node->const = "y";
                $node->var = 0;
                ++$arNumNode["constant"];
                break;

            case "z":
                $name = "Constant" . $arNumNode["constant"];
                $node = new Constant($name);
                $node->const = "z";
                $node->var = 0;
                ++$arNumNode["constant"];
                break;

            default:
                $name = "Variable" . $arNumNode["number"];
                $node = new Variable($name);
                $node->var = $point;
                ++$arNumNode["number"];
        }
        return $node;
    }

    // строительство тройки объектов дерева
    private function trioBuilder($topLec, $leftLec, $rightLec, $topP, $leftP, $rightP, $topObj)
    {

        // вершина тройки
        if (!$topObj) {
            $topTrio = $this->objBuilder($topP);
            $topTrio->lec = $topLec;
        } else {
            $topTrio = $topObj;
        }

        // левая ветвь тройки
        $leftTrio = $this->objBuilder($leftP);
        $leftTrio->lec = $leftLec;

        // правая ветвь тройки
        $rightTrio = $this->objBuilder($rightP);
        $rightTrio->lec = $rightLec;

        // формирование тройки из объектов
        $topTrio->childrenLeft = $leftTrio;
        $topTrio->childrenRight = $rightTrio;
        $leftTrio->parent = $topTrio;
        $rightTrio->parent = $topTrio;
        if (!$topObj) {
            $trio = array($topTrio, $leftTrio, $rightTrio);
            return $trio;
        } else {
            $duo = array($leftTrio, $rightTrio);
            return $duo;
        }
    }
    // поиск вершины для следующей тройки
    private function searchObj($arNode)
    {
        foreach ($arNode as $obj) {
            if (array_key_exists(1, $obj->lec) && !$obj->childrenLeft && !$obj->childrenRight) {
                return $obj;
            }
        }
    }

    // проверка на полное построение дерева
    private function stopBuild($arNode)
    {
        foreach ($arNode as $obj) {
            if (array_key_exists(1, $obj->lec) && !$obj->childrenLeft && !$obj->childrenRight) {
                return FALSE;
            }
        }
        return TRUE;
    }

    // определение точки перегиба выражения
    private function inflPoint($lec)
    {
        $infl = 0;
        $max = 0;
        static $br = 0;
        static $arPrioritet = array(
            "+" => 3,
            "-" => 3,
            "*" => 2,
            "/" => 2,
            "^" => 1
        );

        foreach ($lec as $key => $value) {
            if (preg_match("/^[\d.]/", $value)) {
                continue;
            }
            if ($value == "(") {
                ++$br;
                continue;
            }
            if ($value == ")") {
                --$br;
                continue;
            }
            if (array_key_exists($value, $arPrioritet) && ($arPrioritet[$value] - 3 * $br >= $max)) {

                $max = $arPrioritet[$value] - 3 * $br;
                $infl = $key;
            }
        }
        return $infl;
    }
}