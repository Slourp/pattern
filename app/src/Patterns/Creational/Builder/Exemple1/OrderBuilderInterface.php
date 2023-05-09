<?php

namespace App\Patterns\Creational;

interface OrderBuilderInterface
{
    public function setCustomerName(string $customerName): void;

    public function setCustomerEmail(string $customerEmail): void;

    public function addProduct(string $name, int $quantity, float $price): void;

    public function setShippingMethod(string $shippingMethod): void;

    public function setPaymentMethod(string $paymentMethod): void;

    public function getOrder(): Order;
}
