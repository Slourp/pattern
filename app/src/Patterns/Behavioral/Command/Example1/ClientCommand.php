<?php

namespace App\Patterns\Behavioral\Command\Example1;

class ClientCommand
{
    public function __construct(
        private ?CommandQueue $commandQueue = null,
        private ?Invoker $invoker = null,
        private ?Cart $cart = null
    ) {
        $this->commandQueue = new CommandQueue();
        $this->invoker = new Invoker();
        $this->cart = new Cart();
    }

    public function run(): void
    {
        $product1 = new Product('Product 1', 10.99);
        $product2 = new Product('Product 2', 19.99);

        $addProductCommand1 = new AddProductCommand($product1, $this->cart);
        $addProductCommand2 = new AddProductCommand($product2, $this->cart);

        // Set and execute the first add product command
        $this->invoker->setCommand($addProductCommand1);
        $this->invoker->executeCommand();
        echo "Added Product 1 to the cart.\n";

        // Set and execute the second add product command
        $this->invoker->setCommand($addProductCommand2);
        $this->invoker->executeCommand();
        echo "Added Product 2 to the cart.\n";


        $product3 = new Product('Product 3', 15.99);
        $product4 = new Product('Product 4', 12.99);
        $addProductCommand3 = new AddProductCommand($product3, $this->cart);
        $addProductCommand4 = new AddProductCommand($product4, $this->cart);

        $this->commandQueue->addCommand($addProductCommand3);
        $this->commandQueue->addCommand($addProductCommand4);

        $this->commandQueue->executeAll();

        echo "Added Product 3 and Product 4 to the cart.\n";
    }
}
