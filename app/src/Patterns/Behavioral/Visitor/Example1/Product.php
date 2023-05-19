<?php

namespace App\Patterns\Behavioral\Visitor\Example1;

interface Product
{
    public function accept(ProductVisitor $visitor): void;
}
