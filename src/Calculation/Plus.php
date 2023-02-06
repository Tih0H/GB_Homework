<?php

namespace Tihon\Architecture\Calculation;

use Tihon\Architecture\Calculation\Term;

class Plus extends Term
{
    public function calc()
    {
        return $this->childrenLeft->calc() + $this->childrenRight->calc();
    }
}