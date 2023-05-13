<?php

namespace App\Patterns\Creational\Builder\Example1;

use App\Patterns\Creational\OrderDirector;

class ClientBuilder
{
    public function __construct(
        private OnlineOrderBuilder $builder,
        private OrderDirector $director
    ) {
    }

    public function run()
    {
        // Use the director to build the order
        $order = $this->director->build();

        // Output the order details
        echo 'Customer Name: ' . $order->getCustomerName() . PHP_EOL;
        echo 'Customer Email: ' . $order->getCustomerEmail() . PHP_EOL;
        echo 'Shipping Method: ' . $order->getShippingMethod() . PHP_EOL;
        echo 'Payment Method: ' . $order->getPaymentMethod() . PHP_EOL;
        echo 'Total: $' . $order->getTotal() . PHP_EOL;
    }
}
