<?php

namespace App\Patterns\Behavioral\Mediator\Example1;

class Cart
{
    private array $items = [];

    public function getItems(): array
    {
        return $this->items;
    }

    public function addItem(CartItem $item): void
    {
        array_push($this->items, $item);
    }

    public function removeItem(CartItem $item): void
    {
        $index = array_search($item, $this->items, true);
        if ($index !== false) {
            array_splice($this->items, $index, 1);
        }
    }

    public function getTotalAmount(): float
    {
        return array_sum(
            array_map(
                fn ($item) =>
                $item->getWine()->getPrice() * $item->getQuantity(),
                $this->items
            )
        );
    }
}
