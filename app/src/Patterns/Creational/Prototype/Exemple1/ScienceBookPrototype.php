<?

namespace App\Patterns\Creational\Prototype\Exemple1;

class ScienceBookPrototype extends BookPrototype
{
    protected string $subject = 'Science';

    public function __clone()
    {
    }
}
