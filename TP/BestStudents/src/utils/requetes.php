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
    return $requete->fetch(PDO::FETCH_ASSOC);

}