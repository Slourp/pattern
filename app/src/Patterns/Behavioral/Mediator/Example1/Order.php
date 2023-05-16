<?php

namespace App\Patterns\Behavioral\Mediator\Example1;

class Order
{
    private Customer $customer;
    private Cart $cart;
    private ?Discount $discount;
    private float $totalAmount;

    public function __construct(Customer $customer, Cart $cart, ?Discount $discount = null)
    {
        $this->customer = $customer;
        $this->cart = $cart;
        $this->discount = $discount;
        $this->totalAmount = $this->calculateTotalAmount();
    }

    private function calculateTotalAmount(): float
    {
        $cartTotal = $this->cart->getTotalAmount();
        return  $this->discount ?
            $this->discount->apply($cartTotal) : $cartTotal;
    }

    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    public function getTotalAmount(): float
    {
        return $this->totalAmount;
    }
}
