<?php

namespace App\Patterns\Behavioral\Visitor\Example1;

interface ProductVisitor
{
    public function visitTshirt(Tshirt $tshirt): void;

    public function visitMug(Mug $mug): void;

    public function visitBag(Bag $bag): void;
}
