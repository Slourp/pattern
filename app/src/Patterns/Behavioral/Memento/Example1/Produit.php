<?

namespace App\Patterns\Behavioral\Memento\Example1;

class Produit
{

    public function __construct(
        public string $nom,
        public float $prix
    ) {
    }
}
