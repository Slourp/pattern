<?

namespace App\Patterns\Behavioral\Memento\Example1;

class GardienPanier
{
    private ?Memento $memento = null;

    public function sauvegarderPanier(Panier $panier): void
    {
        $this->memento = $panier->creerMemento();
    }

    public function restaurerPanier(Panier $panier): void
    {
        if ($this->memento) $panier->restaurer($this->memento);
    }
}
