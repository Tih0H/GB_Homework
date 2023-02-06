<?php

namespace Tihon\Architecture\Calculation;

use Tihon\Architecture\Calculation\Term;

class Exponent extends Term
{
    public function calc()
    {
        return pow($this->childrenLeft->calc(), $this->childrenRight->calc());
    }
}