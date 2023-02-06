<?php

namespace Tihon\Architecture\Calculation;

use Tihon\Architecture\Calculation\Term;

class Constant extends Term
{
    public function calc()
    {
        return $this->var;
    }
}
