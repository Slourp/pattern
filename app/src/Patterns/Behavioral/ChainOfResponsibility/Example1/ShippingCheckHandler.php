<?

namespace App\Patterns\Behavioral\ChainOfResponsibility\Example1;

class ShippingCheckHandler implements HandlerInterface
{
    private $nextHandler;
    use ForwardRequestTrait;

    public function setNext(HandlerInterface $handler): self
    {
        $this->nextHandler = $handler;
        return $handler;
    }

    public function handle(PurchaseRequest $request): ?string
    {
        if (!$request->isShippingAvailable) return "Shipping is not available.";


        return $this->forwardRequest($request);
    }
}
