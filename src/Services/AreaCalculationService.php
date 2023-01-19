<?php

namespace Tihon\Architecture\Services;

use Tihon\Architecture\Figures\ICircle;
use Tihon\Architecture\Figures\ISquare;
use Tihon\Architecture\Libs\CircleAreaLib;
use Tihon\Architecture\Libs\SquareAreaLib;

class AreaCalculationService implements ICircle, ISquare
{
    private CircleAreaLib $circleAreaLib;
    private SquareAreaLib $squareAreaLib;

    public function __construct(CircleAreaLib $circleAreaLib, SquareAreaLib $squareAreaLib)
    {
        $this->circleAreaLib = $circleAreaLib;
        $this->squareAreaLib = $squareAreaLib;
    }

    public function circleArea(float $circumference): float
    {
        $diagonal = $circumference / M_PI;
        return $this->circleAreaLib->getCircleArea($diagonal);
    }

    public function squareArea(float $sideSquare): float
    {
        $diagonal = sqrt(2) * $sideSquare;
        return $this->squareAreaLib->getSquareArea($diagonal);
    }
}