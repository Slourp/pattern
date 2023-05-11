<?

namespace App\Patterns\Creational\FactoryMethod\Exemple1;


class ConcreteProductB implements ProductInterface
{
    public function getName(): string
    {
        return 'Product B';
    }
}
