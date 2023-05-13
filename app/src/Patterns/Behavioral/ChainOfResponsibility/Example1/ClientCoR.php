<?php

namespace App\Patterns\Behavioral\ChainOfResponsibility\Example1;

use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Style\SymfonyStyle;

use App\Patterns\Behavioral\ChainOfResponsibility\Example1\CreditCheckHandler;
use App\Patterns\Behavioral\ChainOfResponsibility\Example1\ShippingCheckHandler;
use App\Patterns\Behavioral\ChainOfResponsibility\Example1\StockCheckHandler;

class ClientCoR
{
    private SymfonyStyle $io;

    public function __construct()
    {
        $this->io = new SymfonyStyle(new ArrayInput([]), new ConsoleOutput());
    }

    public function run()
    {
        $this->io->title('🚀 Starting Purchase Request');

        $inStock = $this->readConfirmation('Is product in stock?', true);
        $hasCredit = $this->readConfirmation('Does the user have enough credit?', true);
        $shippingAvailable = $this->readConfirmation('Is shipping available?', true);

        $purchaseRequest = new PurchaseRequest($inStock, $hasCredit, $shippingAvailable);

        $shippingCheckHandler = new ShippingCheckHandler();
        $creditCheckHandler = new CreditCheckHandler();
        $stockCheckHandler = new StockCheckHandler();

        $stockCheckHandler->setNext($creditCheckHandler)->setNext($shippingCheckHandler);

        $result = $stockCheckHandler->handle($purchaseRequest);

        $this->io->title('🎯 Purchase Request Result');

        if ($result !== null) {
            $this->io->error("😢 Error: $result");
        } else {
            $this->io->success('🎉 Success: Purchase completed successfully!');
        }

        $this->io->title('👋 End of Purchase Request');
    }
    private function readConfirmation(string $question, bool $defaultValue): bool
    {
        $default = $defaultValue ? 'yes' : 'no';
        $input = strtolower(readline("$question [$default] ")) ?: $default;

        return $input === 'yes' || $input === 'y';
    }
}
