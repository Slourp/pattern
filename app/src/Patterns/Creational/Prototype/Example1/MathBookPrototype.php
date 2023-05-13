<?

namespace App\Patterns\Creational\Prototype\Example1;


class MathBookPrototype extends BookPrototype
{
    protected string $subject = 'Math';

    public function __clone()
    {
    }
}
