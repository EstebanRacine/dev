<?php

include("fonctions.php");

$adresseDepart = readline("Quel est l'adresse de départ ?");
$adresseArrivee = readline("Quelle est l'adresse d'arrivée ?");
$solde = intval(readline("A combien est votre solde ?"));
$avoir = intval(readline("A combien s'élève l'avoir (si existant) ?"));
if($avoir > 10){
    echo "L'avoir ne peut pas dépasser 10€";
    exit;
}
$villeDepart = ucfirst(NomVille($adresseDepart));
$villeArrivee = ucfirst(NomVille($adresseArrivee));
if($villeDepart == "Paris" and $villeArrivee == "Paris"){
    echo "Trajet de $villeDepart vers $villeArrivee pour 30€";
    $montant = 30;
} elseif ($villeDepart == "Paris"){
    echo "Trajet de Paris vers $villeArrivee pour 50€";
    $montant = 50-$avoir;
    $avoir = 0;
} elseif ($villeArrivee == "Paris"){
    echo "Trajet de $villeDepart vers Paris pour 40€";
    $montant = 40-$avoir/2;
    $avoir *= 0.5;
} else {
    echo "Désolé mais les trajets hors Paris ne sont pas proposés par notre 
    société";
    exit;
};
if($montant > $solde){
    echo "Désolé mais votre solde est insuffisant. Veuillez créditer votre 
    solde";
    exit;
};
$solde -= $montant;
echo PHP_EOL;
echo "Votre nouveau solde est de $solde € et votre nouvel avoir est de $avoir €";