<?php

namespace App\Patterns\Behavioral\Interpreter\Example1;


class OptionsExpression implements Expression
{
    public function interpret(array $context): string
    {
        $options = $context['options'];

        $optionsText = "Options: ";
        foreach ($options as $option) {
            $optionsText .= "{$option['name']} ({$option['value']}), ";
        }
        $optionsText = rtrim($optionsText, ', '); // Remove trailing comma

        return $optionsText;
    }
}
