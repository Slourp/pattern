<?

namespace App\Patterns\Behavioral\Interpreter\Example1;

class DiscountExpression implements Expression
{

    public function __construct(
        private float $discountPercentage
    ) {
    }

    public function interpret(array $context): string
    {
        $totalAmount = $context['total_amount'];
        $discount = $totalAmount * ($this->discountPercentage / 100);
        $discountedAmount = $totalAmount - $discount;

        return "Discount: $discountedAmount (Discount: $discount)";
    }
}
