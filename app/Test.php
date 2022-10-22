<?php
namespace app;

class Test
{
    public function __construct(private string $a, private string $b)
    {

    }
    public function sendMassage(): string
    {
        return $this->a . ' - ' . $this->b;
    }
}

