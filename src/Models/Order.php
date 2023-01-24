<?php

namespace Tihon\Architecture\Models;

use Tihon\Architecture\Interfaces\PayableInterface;

class Order implements PayableInterface
{
    private float $total;
    private string $phone;

    public function __construct($total, $phone)
    {
        $this->total = $total;
        $this->phone = $phone;
    }

    public function getTotalAmount(): float
    {
        return $this->total;
    }

    public function getClientPhone(): string
    {
        return $this->phone;
    }
}