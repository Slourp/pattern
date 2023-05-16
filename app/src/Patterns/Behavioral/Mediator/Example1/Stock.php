<?php

namespace App\Patterns\Behavioral\Mediator\Example1;

class Stock
{

    public function __construct(
        private Wine $wine,
        private int $quantity
    ) {
    }

    public function getWine(): Wine
    {
        return $this->wine;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function decreaseQuantity(int $quantity): void
    {
        if ($this->quantity < $quantity) {
            throw new Exception('Not enough stock');
        }

        $this->quantity -= $quantity;
    }
}
