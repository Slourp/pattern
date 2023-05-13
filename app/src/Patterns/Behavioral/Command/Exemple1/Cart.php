<?

namespace App\Patterns\Behavioral\Command\Exemple1;

class Cart
{
    private $products = [];

    public function addProduct(Product $product): void
    {
        array_push($this->products, $product);
    }

    public function removeProduct(Product $product): void
    {
        $this->removeFromArray($product, $this->products);
    }

    private function removeFromArray($item, array &$array): void
    {
        if (($key = array_search($item, $array)) !== false)
            unset($array[$key]);
    }

    // other cart-related methods here...
}
