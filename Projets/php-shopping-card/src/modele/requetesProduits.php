<?php

include_once "connexionBDD.php";

function getAllProduits(){
    $connexion = createConnection();
    $requete = $connexion->prepare("SELECT * FROM produits");
    $requete -> execute();
    return $requete->fetchAll(PDO::FETCH_ASSOC);
}

function getProduitsByIds($tabId){
    $ids = str_repeat("?,",count($tabId)-1)."?";
    $connexion = createConnection();
    $requete = $connexion->prepare("SELECT * FROM produits WHERE idProduit IN ($ids)");
    $requete -> execute($tabId);
    return $requete->fetchAll(PDO::FETCH_ASSOC);
}

