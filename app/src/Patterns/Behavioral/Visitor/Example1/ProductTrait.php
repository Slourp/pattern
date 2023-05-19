<?php

namespace App\Patterns\Behavioral\Visitor\Example1;

trait ProductTrait
{
    protected string $description;
    protected float $price;

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getPrice(): float
    {
        return $this->price;
    }
}
