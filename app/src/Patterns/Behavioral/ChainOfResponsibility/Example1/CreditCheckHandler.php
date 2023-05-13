<?php

namespace App\Patterns\Behavioral\ChainOfResponsibility\Example1;

class CreditCheckHandler implements HandlerInterface
{
    private const NOT_ENOUGH_CREDIT_ERROR = "Not enough credit.";
    private ?HandlerInterface $nextHandler;
    use ForwardRequestTrait;

    /**
     * Sets the next handler in the chain.
     *
     * @param HandlerInterface $handler
     * @return self
     */
    public function setNext(HandlerInterface $handler): self
    {
        $this->nextHandler = $handler;
        return $this;
    }

    /**
     * Handles the purchase request.
     *
     * @param PurchaseRequest $request
     * @return string|null
     */
    public function handle(PurchaseRequest $request): ?string
    {
        return (!$request->hasEnoughCredit) ?
            self::NOT_ENOUGH_CREDIT_ERROR :
            $this->forwardRequest($request);
    }
}
