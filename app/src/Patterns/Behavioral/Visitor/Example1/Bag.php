<?php

namespace App\Patterns\Behavioral\Visitor\Example1;

class Bag implements Product
{
    use ProductTrait;

    public function accept(ProductVisitor $visitor): void
    {
        $visitor->visitBag($this);
    }
}
