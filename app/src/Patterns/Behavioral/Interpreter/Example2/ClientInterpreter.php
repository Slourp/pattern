<?

namespace App\Patterns\Behavioral\Interpreter\Example2;


class ClientInterpreter
{
    public function run()
    {
        $wines = [
            new Wine('Chateau A', 'Merlot', 20),
            new Wine('Chateau B', 'Cabernet Sauvignon', 30),
            new Wine('Chateau C', 'Syrah', 25),
            new Wine('Chateau D', 'Merlot', 40),
        ];

        $filteredWines = (new WineFilterCombination(
            new WineVarietyFilter('Merlot'),
            new WinePriceFilter(30)
        ))->interpret($wines);


        foreach ($filteredWines as $wine) {
            echo "Name: $wine->name, Variety: $wine->variety, Price: $wine->price" . PHP_EOL . "\n";
        }
    }
}
