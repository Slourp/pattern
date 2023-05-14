<?

namespace App\Patterns\Behavioral\Mediator\Example1;

class ClientMediator
{

    public function run()
    {


        // Création du médiateur
        $boutique = new BoutiqueEnLigne();

        // Création des collègues
        $vigneron = new Vigneron();
        $client = new Client();

        // Injection du médiateur dans les collègues
        $boutique->setVigneron($vigneron);
        $boutique->setClient($client);

        // Le vigneron produit un vin
        $vigneron->produireVin("Pinot Noir");

        // Le client achète le vin
        $client->acheterVin();

        // Récupération de la facture
        // $facture = $boutique->getFacture();

        // Ici, vous pouvez utiliser la facture comme vous le souhaitez
        // Par exemple, afficher les détails de la facture, l'envoyer au client, etc.


    }
}
