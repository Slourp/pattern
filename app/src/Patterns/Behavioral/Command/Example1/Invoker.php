<?

namespace App\Patterns\Behavioral\Command\Example1;

class Invoker
{
    private $command;

    public function setCommand(CommandInterface $cmd)
    {
        $this->command = $cmd;
    }

    public function executeCommand()
    {
        $this->command->execute();
    }
}
