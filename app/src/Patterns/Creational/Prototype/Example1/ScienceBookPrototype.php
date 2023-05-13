<?

namespace App\Patterns\Creational\Prototype\Example1;

class ScienceBookPrototype extends BookPrototype
{
    protected string $subject = 'Science';

    public function __clone()
    {
    }
}
