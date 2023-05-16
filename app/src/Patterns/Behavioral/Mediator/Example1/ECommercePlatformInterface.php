<?php

namespace App\Patterns\Behavioral\Mediator\Example1;

interface ECommercePlatformInterface
{

    public function addToCart(
        Cart $cart,
        Stock $stock,
        int $quantity
    ): void;

    public function createOrder(
        Customer $customer,
        Cart $cart,
        ?Discount $discount = null
    ): Order;

    public function createInvoice(
        Order $order
    ): Invoice;

    public function notifyCustomer(
        Invoice $invoice
    ): void;
}
