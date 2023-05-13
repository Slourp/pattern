<?

namespace App\Patterns\Behavioral\Command\Example1;

class RemoveProductCommand implements CommandInterface
{
    private $product;
    private $cart;

    public function __construct(Product $product, Cart $cart)
    {
        $this->product = $product;
        $this->cart = $cart;
    }

    public function execute(): void
    {
        $this->cart->removeProduct($this->product);
    }
}
