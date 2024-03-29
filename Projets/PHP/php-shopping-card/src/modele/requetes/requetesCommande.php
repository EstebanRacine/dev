<?php

include_once "connexionBDD.php";

function addCommande($idUser){
    $connexion = createConnection();
    $requete = $connexion->prepare("INSERT INTO commande(idUser) VALUES (:idUser)");
    $requete -> bindParam('idUser', $idUser);
    $requete->execute();
}

function getCommandesByUserId($idUser){
    $connexion = createConnection();
    $requete = $connexion->prepare("SELECT * FROM commande WHERE idUser = :idUser");
    $requete->bindParam('idUser', $idUser);
    $requete->execute();
    return $requete->fetchAll(PDO::FETCH_ASSOC);
}

var_dump(getCommandesByUserId(4));