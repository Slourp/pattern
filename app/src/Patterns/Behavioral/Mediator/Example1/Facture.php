<?php

namespace App\Patterns\Behavioral\Mediator\Example1;


class Facture
{
    private $client;
    private $vin;

    public function __construct(Client $client, Vigneron $vigneron)
    {
        $this->client = $client;
        $this->vin = $vigneron->getVin();
    }

    public function genererFacture(): void
    {
        echo "Facture générée pour l'achat du vin par le client.\n";
    }
}
