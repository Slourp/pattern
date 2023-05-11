<?

namespace App\Patterns\Creational\FactoryMethod\Exemple1;


class SimpleFactory implements ProductFactoryInterface
{
    public function createProduct(ProductType $type): ProductInterface
    {
        return match ($type) {
            ProductType::A => new ConcreteProductA(),
            ProductType::B => new ConcreteProductB(),
            default => throw new \InvalidArgumentException('Unknown product type'),
        };
    }
}
