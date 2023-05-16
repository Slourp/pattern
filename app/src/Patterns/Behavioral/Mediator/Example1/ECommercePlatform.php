<?php

namespace App\Patterns\Behavioral\Mediator\Example1;

class ECommercePlatform implements ECommercePlatformInterface
{
    public function addToCart(Cart $cart, Stock $stock, int $quantity): void
    {
        $stock->decreaseQuantity($quantity);
        $cart->addItem(new CartItem($stock->getWine(), $quantity));
    }

    public function createOrder(Customer $customer, Cart $cart, ?Discount $discount = null): Order
    {
        return new Order($customer, $cart, $discount);
    }

    public function createInvoice(Order $order): Invoice
    {
        // Générer un numéro de facture unique
        $invoiceNumber = 'INV-' . strtoupper(uniqid());
        return new Invoice($order, $invoiceNumber);
    }

    public function notifyCustomer(Invoice $invoice): void
    {
        // Simule l'envoi d'une notification par email
        $customerEmail = $invoice->getOrder()->getCustomer()->getEmail();
        $amountDue = $invoice->getAmountDue();
        echo "Notification sent to {$customerEmail} with amount due {$amountDue}\n";
    }
}
