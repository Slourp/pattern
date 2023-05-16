<?php

namespace App\Patterns\Behavioral\Mediator\Example1;

class Wine
{



    public function __construct(
        private string $name,
        private float $price
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }
}
