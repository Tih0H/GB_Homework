<?php

namespace Tihon\Architecture\Interfaces;

interface PaymentInterface
{
    public function pay(float $total, string $phone);
}