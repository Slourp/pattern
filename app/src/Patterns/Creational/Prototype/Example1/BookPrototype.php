<?

namespace App\Patterns\Creational\Prototype\Example1;


abstract class BookPrototype
{
    protected string $title;
    protected string $subject;

    abstract function __clone();

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getSubject(): string
    {
        return $this->subject;
    }
}
