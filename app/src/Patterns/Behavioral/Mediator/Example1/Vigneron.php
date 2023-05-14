<?

namespace App\Patterns\Behavioral\Mediator\Example1;

class Vigneron implements Colleague
{
    private $vin;
    private $mediator;

    public function setMediator(Mediator $mediator): void
    {
        $this->mediator = $mediator;
    }

    public function produireVin($vin): void
    {
        $this->vin = $vin;
        $this->mediator->notify($this, "vin produit");
    }

    public function getVin()
    {
        return $this->vin;
    }
}
