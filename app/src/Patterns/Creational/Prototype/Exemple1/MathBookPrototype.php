<?

namespace App\Patterns\Creational\Prototype\Exemple1;


class MathBookPrototype extends BookPrototype
{
    protected string $subject = 'Math';

    public function __clone()
    {
    }
}
