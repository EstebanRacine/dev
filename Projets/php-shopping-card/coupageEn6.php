<?php
include_once "src/modele/requetesProduits.php";
$produits = getAllProduits();

$listeProduits = [];
$produitsPar5 = [];
$compteur = 0;



foreach ($produits as $produit){
    $produitsPar5[] = $produit;
    $compteur += 1;
    if ($compteur == 6){
        $compteur = 0;
        $listeProduits[] = $produitsPar5;
        $produitsPar5 = [];
    }
}
$listeProduits[] = $produitsPar5;
