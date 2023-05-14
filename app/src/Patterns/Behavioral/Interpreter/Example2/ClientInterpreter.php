<?

namespace App\Patterns\Behavioral\Interpreter\Example2;

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

        $wines = [
            new Wine('Vineyard of the Lost Princess', 'Merlot', 20),
            new Wine('Castle of the Fiery Dragon', 'Cabernet Sauvignon', 30),
            new Wine('Mystic Forest Winery', 'Syrah', 25),
            new Wine('Knight\'s Cellar', 'Merlot', 40),
            new Wine('Enchanted Valley Vineyard', 'Pinot Noir', 35),
            new Wine('Wizards\' Chateau', 'Sauvignon Blanc', 22),
            new Wine('Realm of Shadows Estate', 'Merlot', 28),
            new Wine('Dragonborn Vineyard', 'Chardonnay', 32),
        ];


        $this->io->section('Step 1: Wine List');
        $this->printWineList($wines);
        $this->io->newLine();

        $this->io->section('Step 2: Filtered Wine List');
        $filteredWines = $this->filterWines($wines);
        $this->printWineList($filteredWines);
        $this->io->newLine();

        $this->io->section('Step 3: Output');
        foreach ($filteredWines as $wine) {
            /** @var Wine $wine */
            $this->io->text("🍇 Name: {$wine->name}, Variety: {$wine->variety}, Price: {$wine->price}");
            $this->io->newLine();
        }
    }

    private function filterWines(array $wines): array
    {
        return (new WineFilterCombination(
            new WineVarietyFilter('Merlot'),
            new WinePriceFilter(30)
        ))->interpret($wines);
    }

    private function printWineList(array $wines)
    {
        $this->io->section('🍷 Wine List');
        /** @var Wine $wine */
        foreach ($wines as $wine) $this->io->text("Name: {$wine->name}, Variety: {$wine->variety}, Price: {$wine->price}");
    }
}
