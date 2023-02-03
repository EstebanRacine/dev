<?php

//Lister tous les étudiants
//SQL : SELECT * from etudiant

//1 Créer connexion avec BDD
$host = "localhost:3306";
$baseDonnees = "db_etudiants";
$user = "root";
$password = "";

$dsn = "mysql:host=$host;dbname=$baseDonnees;charset=utf8;";
try {
    $connexion = new PDO($dsn, $user, $password);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $erreur){
    die("Erreur : ".$erreur->getMessage());
}

echo "Connexion établie".PHP_EOL;

//2 : Execution de la requete

//2.1 : Preparation de la requete
$requeteSQL = "SELECT * FROM etudiant";
$requete = $connexion->prepare($requeteSQL);
//2.2 Envoi de la requete pour execution par SGBD
$requete->execute();
//Après ça, $requete contient les enregistrements envoyés par le SGBD


//3 Recuperation des enregistrements
/*//3.1 Indiquer la forme désirée pour récupération
$requete->setFetchMode(PDO::FETCH_ASSOC);*/

//3.2 Récupérer les enregistrements
$etudiants = $requete->fetchAll(PDO::FETCH_ASSOC);

//4 Affichage résultats
if(empty($etudiants)){
    echo "Il n'y a aucun enregistrement dans la table";
}else {
    foreach ($etudiants as $etudiant) {
        echo $etudiant['id_etudiant'] . " " . $etudiant["prenom_etudiant"] . " " . $etudiant["nom_etudiant"] . " " . $etudiant["email_etudiant"] . PHP_EOL;
    }
}

















