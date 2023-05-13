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

    private const TITLE_START = '🚀 Starting Purchase Request' . PHP_EOL;
    private const TITLE_RESULT = '🎯 Purchase Request Result' . PHP_EOL;
    private const TITLE_END = '👋 End of Purchase Request' . PHP_EOL;
    private const SUCCESS_MESSAGE = '🎉 Success: Purchase completed successfully!' . PHP_EOL;
    private const ERROR_MESSAGE = '😢 Error: %s' . PHP_EOL;

    private const QUESTION_STOCK = 'Is product in stock?';
    private const QUESTION_CREDIT = 'Does the user have enough credit?';
    private const QUESTION_SHIPPING = 'Is shipping available?';

    public function __construct()
    {
        $this->io = new SymfonyStyle(new ArrayInput([]), new ConsoleOutput());
    }

    /**
     * Runs the purchase request handling process.
     */
    public function run()
    {
        $this->io->title(self::TITLE_START);

        $inStock = $this->readConfirmation(self::QUESTION_STOCK);
        $hasCredit = $this->readConfirmation(self::QUESTION_CREDIT);
        $shippingAvailable = $this->readConfirmation(self::QUESTION_SHIPPING);

        $purchaseRequest = new PurchaseRequest($inStock, $hasCredit, $shippingAvailable);

        $shippingCheckHandler = new ShippingCheckHandler();
        $creditCheckHandler = new CreditCheckHandler();
        $stockCheckHandler = new StockCheckHandler();

        $stockCheckHandler
            ->setNext($creditCheckHandler)
            ->setNext($shippingCheckHandler);

        $result = $stockCheckHandler->handle($purchaseRequest);

        $this->io->title(self::TITLE_RESULT);

        $result !== null
            ? $this->io->error(sprintf(self::ERROR_MESSAGE, $result))
            : $this->io->success(self::SUCCESS_MESSAGE);

        $this->io->title(self::TITLE_END);
    }

    /**
     * Reads user confirmation from the console.
     *
     * @param string $question The confirmation question.
     * @return bool The user's confirmation answer.
     */
    private function readConfirmation(string $question): bool
    {
        $question = PHP_EOL . $question . ' [yes/no] ';
        $default = strtolower(readline($question) ?: 'no');

        return $default === 'yes' || $default === 'y';
    }
}
