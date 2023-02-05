<?php
include "src/utils/connexionDB.php";

function getAllStudents():array|bool{
    $connexion = createConnection();
    $requeteSQL = "SELECT * FROM etudiants";
    $requete = $connexion->prepare($requeteSQL);
    $requete->execute();
    return $requete->fetchAll(PDO::FETCH_ASSOC);
}