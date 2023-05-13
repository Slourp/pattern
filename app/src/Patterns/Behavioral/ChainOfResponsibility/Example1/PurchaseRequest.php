<?

namespace App\Patterns\Behavioral\ChainOfResponsibility\Example1;

final class PurchaseRequest
{
    public function __construct(
        public readonly bool $inStock,
        public readonly bool $hasEnoughCredit,
        public readonly bool $isShippingAvailable
    ) {
    }
}
