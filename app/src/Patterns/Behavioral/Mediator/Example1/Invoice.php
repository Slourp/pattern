<?php

namespace App\Patterns\Behavioral\Mediator\Example1;

class Invoice
{

    public function __construct(
        private Order $order,
        private  string $invoiceNumber
    ) {
    }

    public function getOrder(): Order
    {
        return $this->order;
    }

    public function getInvoiceNumber(): string
    {
        return $this->invoiceNumber;
    }

    public function getAmountDue(): float
    {
        return $this->order->getTotalAmount();
    }
}
