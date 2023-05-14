<?php

namespace App\Command;

use App\Patterns\Behavioral\ChainOfResponsibility\Example1\ClientCoR;
use App\Patterns\Behavioral\Command\Example1\ClientCommand;
use App\Patterns\Behavioral\Interpreter\Example2\ClientInterpreter as Example2ClientInterpreter;
use App\Patterns\Behavioral\Interpreter\Exemple1\ClientInterpreter;
// Include other necessary classes for behavioral patterns

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'behavioral:run',

    description: 'Runs an example of a behavioral design pattern.',
)]
class RunBehavioralExampleCommand extends Command
{
    protected function configure(): void
    {
        $this
            ->addArgument('pattern', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $pattern = $input->getArgument('pattern');

        match ($pattern) {
            'chainofresponsibility' => $this->runChainOfResponsibilityPatternExample($io),
            'command' => $this->runCommandPatternExample($io),
            'interpreter' => $this->runInterpreterPatternExample($io),
            'iterator' => $this->runIteratorPatternExample($io),
            'mediator' => $this->runMediatorPatternExample($io),
            'memento' => $this->runMementoPatternExample($io),
            'observer' => $this->runObserverPatternExample($io),
            'state' => $this->runStatePatternExample($io),
            'strategy' => $this->runStrategyPatternExample($io),
            'template' => $this->runTemplatePatternExample($io),
            'visitor' => $this->runVisitorPatternExample($io),
            default => $io->error(sprintf('Pattern "%s" is not implemented yet.', $pattern)),
        };

        // $io->success('Behavioral design pattern example has been run successfully.');

        return Command::SUCCESS;
    }

    private function runChainOfResponsibilityPatternExample(): void
    {
        $clientCommand = new ClientCoR();
        $clientCommand->run();
    }

    private function runCommandPatternExample(): void
    {
        // Create a cart instance

        // Create and run the client command
        $clientCommand = new ClientCommand();
        $clientCommand->run();
    }

    private function runInterpreterPatternExample(): void
    {
        $clientInterpreter = new Example2ClientInterpreter();
        $clientInterpreter->run();
    }

    private function runIteratorPatternExample(SymfonyStyle $io): void
    {
        $io->error('Iterator pattern is not implemented yet.');
    }

    private function runMediatorPatternExample(SymfonyStyle $io): void
    {
        $io->error('Mediator pattern is not implemented yet.');
    }

    private function runMementoPatternExample(SymfonyStyle $io): void
    {
        $io->error('Memento pattern is not implemented yet.');
    }

    private function runObserverPatternExample(SymfonyStyle $io): void
    {
        $io->error('Observer pattern is not implemented yet.');
    }

    private function runStatePatternExample(SymfonyStyle $io): void
    {
        $io->error('State pattern is not implemented yet.');
    }

    private function runStrategyPatternExample(SymfonyStyle $io): void
    {
        $io->error('Strategy pattern is not implemented yet.');
    }

    private function runTemplatePatternExample(SymfonyStyle $io): void
    {
        $io->error('Template pattern is not implemented yet.');
    }

    private function runVisitorPatternExample(SymfonyStyle $io): void
    {
        $io->error('Visitor pattern is not implemented yet.');
    }
}
