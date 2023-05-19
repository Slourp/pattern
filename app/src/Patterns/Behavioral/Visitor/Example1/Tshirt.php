<?php

namespace App\Patterns\Behavioral\Visitor\Example1;


class Tshirt implements Product
{
    use ProductTrait;

    public function accept(ProductVisitor $visitor): void
    {
        $visitor->visitTshirt($this);
    }
}
