<?

namespace App\Patterns\Behavioral\Interpreter\Example2;


interface WineExpression
{
    public function interpret(array $wines): array;
}
