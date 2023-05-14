<?

namespace App\Patterns\Behavioral\Interpreter\Example2;

class WinePriceFilter implements WineExpression
{

    public function __construct(private int $maxPrice)
    {
    }

    public function interpret(array $wines): array
    {
        return array_filter($wines, fn ($wine) => $wine->price <= $this->maxPrice);
    }
}
