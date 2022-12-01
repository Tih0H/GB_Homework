<?php
namespace app\abc;

class abc_Test2
{
    public function __construct(private string $a, private string $b)
    {

    }
    public function sendMassage(): string
    {
        return $this->a . ' - ' . $this->b;
    }
}

