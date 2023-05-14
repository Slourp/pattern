<?

namespace App\Patterns\Behavioral\Interpreter\Example2;

class WineVarietyFilter implements WineExpression
{

    public function __construct(private string $variety)
    {
    }

    public function interpret(array $wines): array
    {
        return array_filter($wines, fn ($wine) => $wine->variety === $this->variety);
    }
}
