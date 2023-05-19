<?php

namespace App\Patterns\Behavioral\Visitor\Example1;

class Mug implements Product
{
    use ProductTrait;

    public function accept(ProductVisitor $visitor): void
    {
        $visitor->visitMug($this);
    }
}
