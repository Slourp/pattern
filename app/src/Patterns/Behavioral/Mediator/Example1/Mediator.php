<?

namespace App\Patterns\Behavioral\Mediator\Example1;

interface Mediator
{
    public function notify(object $sender, string $event): void;
}
