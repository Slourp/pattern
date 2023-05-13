<?php

namespace App\Patterns\Creational;

class Order
{
    private string $customerName;
    private string $customerEmail;
    private array $products = [];
    private string $shippingMethod;
    private string $paymentMethod;

    public function setCustomerName(string $customerName): void
    {
        $this->customerName = $customerName;
    }

    public function setCustomerEmail(string $customerEmail): void
    {
        $this->customerEmail = $customerEmail;
    }

    public function addProduct(string $name, int $quantity, float $price): void
    {
        $this->products[] = ['name' => $name, 'quantity' => $quantity, 'price' => $price];
    }

    public function setShippingMethod(string $shippingMethod): void
    {
        $this->shippingMethod = $shippingMethod;
    }

    public function setPaymentMethod(string $paymentMethod): void
    {
        $this->paymentMethod = $paymentMethod;
    }

    public function getCustomerName(): string
    {
        return $this->customerName;
    }

    public function getCustomerEmail(): string
    {
        return $this->customerEmail;
    }

    public function getProducts(): array
    {
        return $this->products;
    }

    public function getShippingMethod(): string
    {
        return $this->shippingMethod;
    }

    public function getPaymentMethod(): string
    {
        return $this->paymentMethod;
    }

    public function getTotal(): float
    {
        return array_reduce(
            $this->products,
            fn ($total, $product) => $total +
                ($product['quantity'] * $product['price']),
            0.0
        );
    }
}
