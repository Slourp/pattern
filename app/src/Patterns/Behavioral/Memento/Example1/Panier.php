<?

namespace App\Patterns\Behavioral\Memento\Example1;

class Panier
{
    public array $produits = [];

    public function ajouterProduit(Produit $produit): void
    {
        $this->produits[] = $produit;
    }

    public function supprimerProduit(Produit $produit): void
    {
        $key = array_search($produit, $this->produits);
        if ($key !== false) {
            unset($this->produits[$key]);
        }
    }

    public function creerMemento(): Memento
    {
        return new Memento($this->produits);
    }

    public function restaurer(Memento $memento): void
    {
        $this->produits = $memento->produits;
    }
}
