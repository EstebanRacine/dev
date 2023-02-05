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

function addStudent(string $prenom, string $nom, string $date_naissance, string $email, string $tel, string $adresse, string $ville):bool{
    $connexion = createConnection();
    $requeteSQL = "INSERT INTO etudiants(prenom, nom, date_naissance, email, tel, adresse, ville)
 VALUES(:prenom, :nom, :date_naissance, :email, :tel, :adresse, :ville)";
    $requete = $connexion->prepare($requeteSQL);
    $requete->bindValue("prenom", $prenom);
    $requete->bindValue("nom", $nom);
    $requete->bindValue("date_naissance", $date_naissance);
    $requete->bindValue("email", $email);
    $requete->bindValue("tel", $tel);
    $requete->bindValue("adresse", $adresse);
    $requete->bindValue("ville", $ville);
    return $requete -> execute();
}