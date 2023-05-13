<?

namespace App\Patterns\Behavioral\ChainOfResponsibility\Example1;

interface HandlerInterface
{
    public function setNext(HandlerInterface $handler): self;

    public function handle(PurchaseRequest $request): ?string;
}
