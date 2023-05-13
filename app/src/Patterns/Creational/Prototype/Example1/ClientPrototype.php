<?

namespace App\Patterns\Creational\Prototype\Example1;

class ClientPrototype
{
    private $books = [];


    public function run()
    {
        // Instantiate the prototypes
        $scienceBookPrototype = new ScienceBookPrototype();
        $mathBookPrototype = new MathBookPrototype();
        // cloning the prototypes
        $scienceBook1 = clone $scienceBookPrototype;
        $scienceBook1->setTitle('Physics for Beginners');
        $this->books[] = $scienceBook1;

        $scienceBook2 = clone $scienceBookPrototype;
        $scienceBook2->setTitle('Introduction to Chemistry');
        $this->books[] = $scienceBook2;

        $mathBook1 = clone $mathBookPrototype;
        $mathBook1->setTitle('Calculus 101');
        $this->books[] = $mathBook1;

        $mathBook2 = clone $mathBookPrototype;
        $mathBook2->setTitle('Linear Algebra Basics');
        $this->books[] = $mathBook2;

        // display the books using array_walk
        array_walk($this->books, fn ($book) => print("Title: {$book->getTitle()}, Subject: {$book->getSubject()}" . PHP_EOL));
    }
}
