<?

namespace App\Patterns\Creational\FactoryMethod\Example1;


class ConcreteProductB implements ProductInterface
{
    public function getName(): string
    {
        return 'Product B';
    }
}
