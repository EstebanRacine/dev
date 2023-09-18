<?php

require_once "../src/Commande.php";

$client = new Client(
    1,
    "Lefevre",
    "0636073242",
    "1 rue de la Paix",
    "Lille",
    "France",
    "59000"
);

$prod1 = new Produit("1", "Clavier", "10", "20", "pcs");
$prod2 = new Produit("2", "Souris", "5", "20", "pcs");
$prod3 = new Produit("3", "Main d'oeuvre", "60", "20", "h");

$commande = new Commande(1, new DateTime(), "Paypal", "30 jours", $client);
$commande->addProduit($prod1, 2);
$commande->addProduit($prod3, 1);
$commande->addProduit($prod2, 1);

echo $commande->editerBon();
