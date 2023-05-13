<?

namespace App\Patterns\Behavioral\Command\Example1;

class Product
{

    public function __construct(
        private string $name,
        private float $price
    ) {
    }

    // getters and setters here...
}
