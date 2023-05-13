<?php

namespace App\Patterns\Behavioral\Interpreter\Example1;


interface Expression
{
    public function interpret(array $context): string;
}
