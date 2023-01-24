<?php

namespace Tihon\Architecture\Services;

use Tihon\Architecture\Interfaces\PaymentInterface;

class QiwiService implements PaymentInterface
{
    public function pay(float $total, string $phone): void
    {
        echo "Принят платеж $total рублей от $phone. Платежная система Qiwi" . PHP_EOL;
    }
}