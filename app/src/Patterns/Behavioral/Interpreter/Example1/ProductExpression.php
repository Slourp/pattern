<?php

namespace App\Patterns\Behavioral\Interpreter\Example1;


class ProductExpression implements Expression
{
    public function interpret(array $context): string
    {
        $product = $context['product'];

        return "Product: {$product['name']} (Quantity: {$product['quantity']})";
    }
}
