<?php

namespace App\Patterns\Creational;

class OrderDirector
{

    public function __construct(private OrderBuilderInterface $builder)
    {
    }

    public function build(): Order
    {
        $this->builder->setCustomerName('John Doe');
        $this->builder->setCustomerEmail('john.doe@example.com');
        $this->builder->addProduct('Product 1', 2, 9.99);
        $this->builder->addProduct('Product 2', 1, 19.99);
        $this->builder->setShippingMethod('Express');
        $this->builder->setPaymentMethod('Credit Card');

        return $this->builder->getOrder();
    }
}
