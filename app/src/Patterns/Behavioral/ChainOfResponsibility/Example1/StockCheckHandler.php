<?

namespace App\Patterns\Behavioral\ChainOfResponsibility\Example1;

class StockCheckHandler implements HandlerInterface
{
    private $nextHandler;
    use ForwardRequestTrait;

    public function setNext(HandlerInterface $handler): HandlerInterface
    {
        $this->nextHandler = $handler;
        return $this->nextHandler;
    }

    public function handle(PurchaseRequest $request): ?string
    {
        if (!$request->inStock) return "Product is not in stock.";


        return $this->forwardRequest($request);
    }
}
