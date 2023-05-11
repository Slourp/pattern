<?

namespace App\Patterns\Creational\FactoryMethod\Exemple1;


class ConcreteProductA implements ProductInterface
{
    public function getName(): string
    {
        return 'Product A';
    }
}
