<?php

namespace Tihon\Architecture\Interfaces;

interface PayableInterface
{
    public function getTotalAmount(): float;

    public function getClientPhone(): string;
}