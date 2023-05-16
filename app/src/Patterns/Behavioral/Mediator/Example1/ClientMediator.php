<?php

namespace App\Patterns\Behavioral\Mediator\Example1;

class ClientMediator
{


    public function __construct(
        private ?ECommercePlatformInterface $platform = null
    ) {
        if (is_null($this->platform))  $this->platform = new ECommercePlatform();
    }

    public function run(): void
    {
        // Créer quelques instances de Wine
        $wine1 = new Wine('Cabernet Sauvignon', 20.00);
        $wine2 = new Wine('Pinot Noir', 25.00);

        // Créer des stocks pour ces vins
        $stock1 = new Stock($wine1, 50);
        $stock2 = new Stock($wine2, 50);

        // Créer un client
        $customer = new Customer('John Doe', 'john.doe@example.com');

        // Créer un panier
        $cart = new Cart();

        // Ajouter des vins au panier
        $this->platform->addToCart($cart, $stock1, 2);
        $this->platform->addToCart($cart, $stock2, 3);

        // Créer un discount
        $discount = new Discount(0.1); // 10% de réduction

        // Créer une commande
        $order = $this->platform->createOrder($customer, $cart, $discount);

        // Créer une facture
        $invoice = $this->platform->createInvoice($order);

        // Notifier le client
        $this->platform->notifyCustomer($invoice);

        // Afficher le montant total de la facture
        echo "Total amount: {$invoice->getAmountDue()}\n";
    }
}
