<?

namespace App\Patterns\Behavioral\Interpreter\Exemple1;


class SingleVarietyExpression implements WineVarietyExpression
{

    public function __construct(
        private string $variety
    ) {
    }

    public function interpret(array $wineVarieties): bool
    {
        return in_array($this->variety, $wineVarieties);
    }
}
