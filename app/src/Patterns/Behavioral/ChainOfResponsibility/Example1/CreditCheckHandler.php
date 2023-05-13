<?

namespace App\Patterns\Behavioral\ChainOfResponsibility\Example1;

class CreditCheckHandler implements HandlerInterface
{
    private $nextHandler;

    public function setNext(HandlerInterface $handler): self
    {
        $this->nextHandler = $handler;
        return $this;
    }

    public function handle(PurchaseRequest $request): ?string
    {
        if (!$request->hasEnoughCredit) return "Not enough credit.";


        return $this->nextHandler ? $this->nextHandler->handle($request) : null;
    }
}
