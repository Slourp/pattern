<?php

namespace App\Patterns\Behavioral\Mediator\Example1;

class CartItem
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

    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }
}
