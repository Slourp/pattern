<?

namespace App\Patterns\Behavioral\Interpreter\Example2;

class WineFilterCombination implements WineExpression
{
    private array $expressions;

    public function __construct(WineExpression ...$expressions)
    {
        $this->expressions = $expressions;
    }

    public function interpret(array $wines): array
    {
        // $result = $wines;

        // foreach ($this->expressions as $expression) {
        //     $result = $expression->interpret($result);
        // }

        // return $result;

        return array_reduce($this->expressions, fn ($result, $expression) => $expression->interpret($result), $wines);
    }
}
