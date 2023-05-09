<?php

namespace App\Patterns\Creational\Builder\Exemple1;

use App\Patterns\Creational\Order;
use App\Patterns\Creational\OrderBuilderInterface;

class OnlineOrderBuilder implements OrderBuilderInterface
{
    private Order $order;

    public function __construct()
    {
        $this->order = new Order();
    }

    public function setCustomerName(string $customerName): void
    {
        $this->order->setCustomerName($customerName);
    }

    public function setCustomerEmail(string $customerEmail): void
    {
        $this->order->setCustomerEmail($customerEmail);
    }

    public function addProduct(string $name, int $quantity, float $price): void
    {
        $this->order->addProduct($name, $quantity, $price);
    }

    public function setShippingMethod(string $shippingMethod): void
    {
        $this->order->setShippingMethod($shippingMethod);
    }

    public function setPaymentMethod(string $paymentMethod): void
    {
        $this->order->setPaymentMethod($paymentMethod);
    }

    public function getOrder(): Order
    {
        return $this->order;
    }
}
