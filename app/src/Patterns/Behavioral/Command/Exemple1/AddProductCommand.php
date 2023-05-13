<?

namespace App\Patterns\Behavioral\Command\Exemple1;

class AddProductCommand implements CommandInterface
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
        $this->cart->addProduct($this->product);
    }
}
