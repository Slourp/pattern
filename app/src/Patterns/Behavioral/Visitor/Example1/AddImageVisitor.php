<?php

namespace App\Patterns\Behavioral\Visitor\Example1;


class AddImageVisitor implements ProductVisitor
{

    public function __construct(private string $imagePath)
    {
    }

    public function visitTshirt(Tshirt $tshirt): void
    {
        // Logic to add image to a Tshirt
    }

    public function visitMug(Mug $mug): void
    {
        // Logic to add image to a Mug
    }

    public function visitBag(Bag $bag): void
    {
        // Logic to add image to a Bag
    }
}
