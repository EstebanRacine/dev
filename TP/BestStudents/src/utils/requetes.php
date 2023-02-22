<?php
include "src/utils/connexionDB.php";

function getAllStudents():array|bool{
    $connexion = createConnection();
    $requeteSQL = "SELECT * FROM etudiants";
    $requete = $connexion->prepare($requeteSQL);
    $requete->execute();
    return $requete->fetchAll(PDO::FETCH_ASSOC);
}

function getStudentById($id){
    $connexion = createConnection();
    $requeteSQL = "SELECT * FROM etudiants WHERE id = :id";
    $requete = $connexion->prepare($requeteSQL);
    $requete->bindValue("id", $id);
    $requete->execute();
    return $requete->fetchAll(PDO::FETCH_ASSOC);

}

function addStudent(string $prenom, string $nom, string $date_naissance, string $email, string $tel, string $adresse, string $ville, string $image, int $promo):bool{
    $connexion = createConnection();
    $requeteSQL = "INSERT INTO etudiants(prenom, nom, date_naissance, email, tel, adresse, ville, img, promo_etudiant)
 VALUES(:prenom, :nom, :date_naissance, :email, :tel, :adresse, :ville, :image, :promo)";
    $requete = $connexion->prepare($requeteSQL);
    $requete->bindValue("prenom", $prenom);
    $requete->bindValue("nom", $nom);
    $requete->bindValue("date_naissance", $date_naissance);
    $requete->bindValue("email", $email);
    $requete->bindValue("tel", $tel);
    $requete->bindValue("adresse", $adresse);
    $requete->bindValue("ville", $ville);
    $requete->bindValue("image", $image);
    $requete->bindValue("promo", $promo);
    return $requete -> execute();
}


function getAllPromo():array{
    $connexion = createConnection();
    $requete = $connexion-> prepare("SELECT * FROM promotions");
    $requete->execute();
    return $requete->fetchAll(PDO::FETCH_ASSOC);
}

function getPromoNameById($id){
    $connexion = createConnection();
    $requete = $connexion->prepare("SELECT nom_promo FROM promotions WHERE id_promo = :id");
    $requete->bindValue("id", $id);
    $requete -> execute();
    return $requete->fetch(PDO::FETCH_ASSOC);
}

function getStudentsInPromo($id_promo){
    $connexion = createConnection();
    $requete = $connexion->prepare("SELECT * FROM etudiants WHERE promo_etudiant = :id_promo");
    $requete->bindValue("id_promo", $id_promo);
    $requete ->execute();
    return $requete->fetchAll(PDO::FETCH_ASSOC);
}