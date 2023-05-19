<?php

namespace App\Patterns\Behavioral\Visitor\Example1;

class AddTextVisitor implements ProductVisitor
{
    private string $text;

    public function __construct(string $text)
    {
        $this->text = $text;
    }

    public function visitTshirt(Tshirt $tshirt): void
    {
        // Logic to add text to a Tshirt
    }

    public function visitMug(Mug $mug): void
    {
        // Logic to add text to a Mug
    }

    public function visitBag(Bag $bag): void
    {
        // Logic to add text to a Bag
    }
}
