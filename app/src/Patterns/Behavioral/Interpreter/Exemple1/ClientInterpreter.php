<?php

namespace App\Patterns\Behavioral\Interpreter\Exemple1;


use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Style\SymfonyStyle;

class ClientInterpreter
{
    private SymfonyStyle $io;

    public function __construct()
    {
        $this->io = new SymfonyStyle(new ArrayInput([]), new ConsoleOutput());
    }

    public function run()
    {
        $this->io->title('🍷 Starting Interpreter Example');
        $this->io->newLine();

        // Define a list of wine varieties.
        $wineVarieties = ['Merlot', 'Chardonnay', 'Cabernet'];

        $this->io->section('🍇 Creating Expressions');
        $this->io->newLine();

        // Create expressions for each wine variety to be checked.
        $merlotExpression = new SingleVarietyExpression('Merlot');
        $chardonnayExpression = new SingleVarietyExpression('Chardonnay');
        $cabernetExpression = new SingleVarietyExpression('Cabernet');
        $syrahExpression = new SingleVarietyExpression('Syrah'); // Note that Syrah is not in our list of wine varieties.

        // Create an expression that will be true if all contained expressions are true.
        // In this case, the expression should return true because all varieties are in the list.
        $allExpressionTrue = new AllVarietiesMatchExpression($merlotExpression, $chardonnayExpression, $cabernetExpression);

        // Create another expression that will be true if all contained expressions are true.
        // However, in this case, the expression should return false because Syrah is not in the list.
        $allExpressionFalse = new AllVarietiesMatchExpression($merlotExpression, $chardonnayExpression, $syrahExpression);

        $this->io->section('🔍 Interpreting Expressions');
        $this->io->newLine();

        $this->printVarieties($wineVarieties);
        $this->io->newLine();

        $this->printExpressionCheck($allExpressionTrue, $wineVarieties);
        $this->printExpressionCheck($allExpressionFalse, $wineVarieties);
    }

    /**
     * Prints the list of wine varieties being checked.
     *
     * @param array $wineVarieties The list of wine varieties.
     */
    private function printVarieties(array $wineVarieties)
    {
        $this->io->section('🍷 Wine Varieties');
        $this->io->listing($wineVarieties);
    }

    /**
     * Prints the expression being evaluated for a specific wine variety.
     *
     * @param WineVarietyExpression $expression The expression being evaluated.
     * @param array $wineVarieties The list of wine varieties.
     */
    private function printExpressionCheck(WineVarietyExpression $expression, array $wineVarieties)
    {
        $expressionString = get_class($expression);

        $this->io->section('📜 Checking Varieties');
        $this->io->newLine();
        $this->io->text("🔍 Expression: $expressionString");

        $this->io->section('🍷 Wine Varieties');
        $this->io->listing($wineVarieties);

        $result = $expression->interpret($wineVarieties);

        $resultString = $result ? '✅ true' : '❌ false';
        $this->io->text("🎯 Result: $resultString");

        $this->io->newLine();
    }
}
