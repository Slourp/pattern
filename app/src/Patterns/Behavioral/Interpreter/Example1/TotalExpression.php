<?php

namespace App\Patterns\Behavioral\Interpreter\Example1;




class TotalExpression implements Expression
{
    public function interpret(array $context): string
    {
        $total = $context['total'];

        return "Total: {$total} €";
    }
}
