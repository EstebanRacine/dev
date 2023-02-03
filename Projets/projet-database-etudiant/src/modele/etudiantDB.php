<?php

include 'connexionDB.php';

function getAllStudents():array{
    $connexion = createConnection();
    $requeteSQL = "SELECT * FROM etudiant";
    $requete = $connexion->prepare($requeteSQL);
    $requete->execute();
    $etudiant = $requete->fetchAll(PDO::FETCH_ASSOC);
    return $etudiant;
}

function getStudentByID(int $id):array{
    $connexion = createConnection();
    $requeteSQL = "SELECT * FROM etudiant WHERE id_etudiant = :id";
    $requete = $connexion->prepare($requeteSQL);
    $requete->bindValue("id", $id);
    $requete->execute();
    $etudiant = $requete->fetchAll(PDO::FETCH_ASSOC);
    return $etudiant;
}

function displayStudent($etudiant):void{
    if(!$etudiant){
        echo "Il n'y a pas d'étudiant relié à cet ID";
    }else{
        foreach ($etudiant as $eleve){
            echo $eleve['id_etudiant']." | ".
                $eleve['prenom_etudiant']." | ".
                $eleve['nom_etudiant']." | ".
                $eleve['email_etudiant'].PHP_EOL;
        }}
    echo PHP_EOL;
}

function addStudent(string $prenom,string $nom,string $email,string $birth,string $address,string $tel):bool{
    $connexion = createConnection();
    $requeteSQL = "INSERT INTO etudiant (prenom_etudiant, nom_etudiant, email_etudiant, date_naissance_etudiant, 
                      adresse_etudiant, tel_etudiant)
 VALUES(:prenom, :nom, :email, :birth, :address, :tel)";
    $requete = $connexion->prepare($requeteSQL);
    $requete->bindValue("prenom", $prenom);
    $requete->bindValue("nom", $nom);
    $requete->bindValue("email", $email);
    $requete->bindValue("birth", $birth);
    $requete->bindValue("address", $address);
    $requete->bindValue("tel", $tel);
    return $requete->execute();
}