<?

namespace App\Patterns\Creational\FactoryMethod\Exemple1;


interface ProductFactoryInterface
{
    public function createProduct(ProductType $type): ProductInterface;
}
