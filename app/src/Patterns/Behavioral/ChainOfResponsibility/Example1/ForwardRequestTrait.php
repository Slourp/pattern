<?php

namespace App\Patterns\Behavioral\ChainOfResponsibility\Example1;

trait ForwardRequestTrait
{
    /**
     * Forward the purchase request to the next handler in the chain.
     *
     * @param PurchaseRequest $request The purchase request object
     * @return string|null The result of the forwarded request or null if there is no next handler
     */
    private function forwardRequest(PurchaseRequest $request): ?string
    {
        return $this->nextHandler?->handle($request);
    }
}
