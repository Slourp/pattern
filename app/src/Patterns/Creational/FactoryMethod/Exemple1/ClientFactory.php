<?

namespace App\Patterns\Creational\FactoryMethod\Exemple1;

class ClientFactory
{
    public function __construct(private SimpleFactory $simpleFactory)
    {
    }

    public function run()
    {
        $product = $this->simpleFactory->createProduct(ProductType::A);
        echo 'Product Name: ' . $product->getName() . PHP_EOL;
    }
}
