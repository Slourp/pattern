<?

namespace App\Patterns\Behavioral\Mediator\Example1;

interface Colleague
{
    public function setMediator(Mediator $mediator): void;
}
