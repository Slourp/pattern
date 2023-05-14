<?

namespace App\Patterns\Behavioral\Mediator\Example1;

class Client implements Colleague
{
    private $mediator;

    public function setMediator(Mediator $mediator): void
    {
        $this->mediator = $mediator;
    }

    public function acheterVin(): void
    {
        $this->mediator->notify($this, "vin acheté");
    }
}
