<?php

namespace App\Patterns\Behavioral\Memento\Example1;

use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Style\SymfonyStyle;

class ClientMomento
{
    private SymfonyStyle $io;

    public function __construct()
    {
        $this->io = new SymfonyStyle(new ArrayInput([]), new ConsoleOutput());
    }

    public function run()
    {
        $this->io->title('🛒 Starting Memento Pattern Example');

        // Créer un nouveau panier
        $panier = new Panier();

        // Créer quelques produits
        $vinRouge = new Produit("Vin Rouge", 15.50);
        $vinBlanc = new Produit("Vin Blanc", 12.00);

        // Ajouter les produits au panier
        $panier->ajouterProduit($vinRouge);
        $panier->ajouterProduit($vinBlanc);

        // Afficher le contenu du panier initial
        $this->io->section('🛍️ Contenu initial du panier:');
        $this->afficherPanier($panier);

        // Créer le gardien et sauvegarder l'état du panier
        $gardien = new GardienPanier();
        $gardien->sauvegarderPanier($panier);

        // Supprimer un produit du panier
        $this->io->section('🗑️ Suppression du produit : ' . $vinBlanc->nom);
        $panier->supprimerProduit($vinBlanc);

        // Afficher le contenu du panier après suppression
        $this->io->section('🗑️ Contenu du panier après suppression:');
        $this->afficherPanier($panier);

        // Restaurer l'état du panier
        $gardien->restaurerPanier($panier);

        // Afficher le contenu du panier après restauration
        $this->io->section('🔄 Contenu du panier après restauration:');
        $this->afficherPanier($panier);
    }


    private function afficherPanier(Panier $panier): void
    {
        foreach ($panier->produits as $produit) {
            $this->io->text("Produit: " . $produit->nom . ", Prix: " . $produit->prix);
        }
        $this->io->newLine();
    }
}
