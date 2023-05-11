<?php

namespace App\Command;

use App\Patterns\Creational\Builder\Exemple1\ClientBuilder;
use App\Patterns\Creational\Builder\Exemple1\OnlineOrderBuilder;
use App\Patterns\Creational\FactoryMethod\Exemple1\ClientFactory;
use App\Patterns\Creational\FactoryMethod\Exemple1\ProductFactoryInterface;
use App\Patterns\Creational\OrderDirector;
use App\Patterns\Creational\Prototype\Exemple1\ClientPrototype;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'creational:run',
    description: 'Runs an example of a creational design pattern.',
)]
class RunCreationalExampleCommand extends Command
{

    public function __construct(private ProductFactoryInterface $factory)
    {
        parent::__construct();
    }
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

        $io->success(sprintf('The %s pattern example has been run successfully.', $pattern));

        match ($pattern) {
            // 'abstractfactory' => (new ClientAbstractFactory())->run(),
            'builderpattern' => (new ClientBuilder(
                new OnlineOrderBuilder(),
                new OrderDirector(new OnlineOrderBuilder())
            ))->run(),
            'factorymethod' => (new ClientFactory($this->factory))->run(),
            'prototype' => (new ClientPrototype())->run(),
            'singleton' => $io->error('Singleton not implemented yet.'),
            default => $io->error(sprintf('Unknown pattern "%s".', $pattern)),
        };

        return Command::SUCCESS;
    }
}
