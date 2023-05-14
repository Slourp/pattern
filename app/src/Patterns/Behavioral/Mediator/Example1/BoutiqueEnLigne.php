<?php

namespace App\Patterns\Behavioral\Mediator\Example1;

class BoutiqueEnLigne implements Mediator
{
    private $vigneron;
    private $client;
    private $facture;

    public function setVigneron(Vigneron $vigneron): void
    {
        $this->vigneron = $vigneron;
        $this->vigneron->setMediator($this);
    }

    public function setClient(Client $client): void
    {
        $this->client = $client;
        $this->client->setMediator($this);
    }

    public function notify(object $sender, string $event): void
    {
        if ($event == "vin produit") {
            echo "Le vin a été produit par le vigneron.\n";
        }

        if ($event == "vin acheté") {
            echo "Le vin a été acheté par le client.\n";
            $this->facture = new Facture($this->client, $this->vigneron);
            $this->facture->genererFacture();
        }
    }

    public function getFacture(): Facture
    {
        return $this->facture;
    }
}
