<?


namespace App\Patterns\Behavioral\Interpreter\Example1;

use App\Patterns\Behavioral\Interpreter\Exemple1\WineVarietyExpression;

class AnyVarietyMatchesExpression implements WineVarietyExpression
{
    private $expressions;

    public function __construct(WineVarietyExpression ...$expressions)
    {
        $this->expressions = $expressions;
    }

    public function interpret(array $wineVarieties): bool
    {
        // The `array_reduce` function is used to reduce the array of expressions
        // into a single boolean value by applying a callback function.
        // The initial value is set to `false`.
        return array_reduce(
            $this->expressions,
            // The callback function takes two parameters: `$carry` and `$expression`.
            // `$carry` holds the accumulated value of the reduction (initially `false`).
            // `$expression` is the current expression being processed.
            // The arrow function (`fn`) is used here for brevity.
            fn ($carry, $expression) => $carry || $expression->interpret($wineVarieties),
            false
        );
    }
}
