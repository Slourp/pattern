<?

namespace App\Patterns\Creational\FactoryMethod\Example1;


class ConcreteProductA implements ProductInterface
{
    public function getName(): string
    {
        return 'Product A';
    }
}
