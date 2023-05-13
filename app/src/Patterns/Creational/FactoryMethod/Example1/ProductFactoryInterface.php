<?

namespace App\Patterns\Creational\FactoryMethod\Example1;


interface ProductFactoryInterface
{
    public function createProduct(ProductType $type): ProductInterface;
}
