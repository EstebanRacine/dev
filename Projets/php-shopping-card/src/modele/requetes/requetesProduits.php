<?php

include_once "../connexionBDD.php";

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

//function getProduitsParPage($page){
//    $connexion = createConnection();
//    $sql = "SELECT * FROM produits LIMIT 6";
//    if ($page <> 0){
//        $sql.= " OFFSET :page ";
//    }
//    $requete = $connexion->prepare($sql);
//    if ($page<>0) {
//        $requete->bindValue("page", 6 * ($page));
//    }
//    $requete -> execute();
//    return $requete->fetchAll(PDO::FETCH_ASSOC);
//}

function getProduitsParPage($page)
{
    $connexion = createConnection();
    $sql = "SELECT * FROM produits LIMIT ? OFFSET ? ";
    $requete = $connexion->prepare($sql);
    $requete->bindValue(1, 6, PDO::PARAM_INT);
    $requete->bindValue(2, 6*$page, 1);
    $requete->execute();
    return $requete->fetchAll(PDO::FETCH_ASSOC);
}




function getNbProduits(){
    $connexion = createConnection();
    $requete = $connexion->prepare("SELECT COUNT(*) as nbProd FROM PRODUITS");
    $requete -> execute();
    return $requete->fetch(PDO::FETCH_ASSOC);
}
