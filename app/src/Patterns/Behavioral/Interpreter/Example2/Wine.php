<?

namespace App\Patterns\Behavioral\Interpreter\Example2;

class Wine
{
    public function __construct(
        public readonly string $name,
        public readonly string $variety,
        public readonly int $price
    ) {
    }
}
