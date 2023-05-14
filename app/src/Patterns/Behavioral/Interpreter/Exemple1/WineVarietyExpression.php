<?

namespace App\Patterns\Behavioral\Interpreter\Exemple1;

interface WineVarietyExpression
{
    public function interpret(array $wineVarieties): bool;
}
