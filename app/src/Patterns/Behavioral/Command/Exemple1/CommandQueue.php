<?

namespace App\Patterns\Behavioral\Command\Exemple1;

class CommandQueue
{
    private $queue = [];

    public function addCommand(CommandInterface $command): void
    {
        $this->queue[] = $command;
    }

    public function executeAll(): void
    {
        array_walk($this->queue, fn (CommandInterface $command) => $command->execute());

        // Clear the queue
        $this->queue = [];
    }
}
