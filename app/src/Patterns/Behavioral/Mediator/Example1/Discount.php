<?php

namespace App\Patterns\Behavioral\Mediator\Example1;

class Discount
{

    public function __construct(private float $rate)
    {
    }

    public function getRate(): float
    {
        return $this->rate;
    }

    public function apply(float $amount): float
    {
        return $amount - ($amount * $this->rate);
    }
}
