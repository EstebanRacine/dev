<?php

include_once "../connexionBDD.php";

function getProduitsByCommande($idCommande){
    $connexion = createConnection();
    $requete = $connexion->prepare("SELECT nomProduit, imgProduit, prixProduit, qteProd FROM contenu INNER JOIN produits ON produits.idProduit = contenu.idProduit WHERE idCommande = :idCommande");
    $requete->bindParam('idCommande', $idCommande);
    $requete->execute();
    return $requete->fetchAll(PDO::FETCH_ASSOC);
}