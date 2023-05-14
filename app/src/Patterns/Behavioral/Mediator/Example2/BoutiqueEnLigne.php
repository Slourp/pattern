<?php

namespace App\Patterns\Behavioral\Mediator\Example2;

class BoutiqueEnLigne implements Mediator
{
    private $vignerons = [];
    private $clients = [];
    private $panier;
    private $catalogue;
    private $methodesPaiement = [];
    private $optionsLivraison = [];

    public function setVigneron(Vigneron $vigneron): void
    {
        $this->vignerons[] = $vigneron;
        $vigneron->setMediator($this);
    }

    public function setClient(Client $client): void
    {
        $this->clients[] = $client;
        $client->setMediator($this);
    }

    public function setPanier(Panier $panier): void
    {
        $this->panier = $panier;
        $panier->setMediator($this);
    }

    public function setCatalogue(Catalogue $catalogue): void
    {
        $this->catalogue = $catalogue;
        $catalogue->setMediator($this);
    }

    public function setMethodePaiement(MethodePaiement $methodePaiement): void
    {
        $this->methodesPaiement[] = $methodePaiement;
        $methodePaiement->setMediator($this);
    }

    public function setOptionLivraison(OptionLivraison $optionLivraison): void
    {
        $this->optionsLivraison[] = $optionLivraison;
        $optionLivraison->setMediator($this);
    }

    public function notify(Colleague $sender, string $event): void
    {
        // Gérer les notifications ici
    }
}
