<?

namespace App\Patterns\Behavioral\Interpreter\Exemple1;

class AllVarietiesMatchExpression implements WineVarietyExpression
{
    private $expressions;

    public function __construct(WineVarietyExpression ...$expressions)
    {
        $this->expressions = $expressions;
    }

    public function interpret(array $wineVarieties): bool
    {
        return array_reduce(
            $this->expressions,
            fn ($carry, $expression) => $carry && $expression->interpret($wineVarieties),
            true
        );
    }
}
