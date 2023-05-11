<?php

namespace App\Patterns\Creational\Singleton\Exemple1;

class ClientSingleton
{
    public function run()
    {
        $cart = Cart::getInstance();
        $cart->addItem('Apple');
        $cart->addItem('Banana');

        $itemsInCart = implode(', ', $cart->getItems());
        echo "Items in cart: $itemsInCart" . PHP_EOL;

        // Trying to get another instance of Cart
        $anotherCart = Cart::getInstance();

        $itemsInAnotherCart = implode(', ', $anotherCart->getItems());
        echo "Items in another cart: $itemsInAnotherCart" . PHP_EOL;

        try {
            $thirdCart = new Cart(); // This will throw an error
            $itemsInAnotherCart = implode(', ', $thirdCart->getItems());
            echo "Items in another cart: $itemsInAnotherCart" . PHP_EOL;
        } catch (\Error $e) {
            echo "Error: Cannot create another instance of Cart. Use Cart::getInstance() to obtain the existing instance." . PHP_EOL;
        }
    }
}
