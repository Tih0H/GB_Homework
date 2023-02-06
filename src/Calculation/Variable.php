<?php

namespace Tihon\Architecture\Calculation;

use Tihon\Architecture\Calculation\Term;

class Variable extends Term
{
    public function calc()
    {
        return $this->var;
    }
}