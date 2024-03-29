<?php

include "connexionBDD.php";

function getAllLogins(){
    $connexion = createConnection();
    $requete = $connexion->prepare("SELECT loginUser FROM users");
    $requete->execute();
    $users = $requete->fetchAll(PDO::FETCH_COLUMN);
    return $users;
}

function verifConnexion($login, $password):bool{
    if (!in_array($login, getAllLogins())){
        return False;
    }else{
        $connexion = createConnection();
        $requete = $connexion->prepare("SELECT passwordUser FROM users WHERE loginUser = :login");
        $requete -> bindParam('login', $login);
        $requete -> execute();
        $passwordBDD = $requete->fetch(PDO::FETCH_ASSOC);
        return password_verify($password, $passwordBDD['passwordUser']);
    }
}

function addUser($nom, $prenom, $login, $password,$mail){
    $connexion = createConnection();
    $password = password_hash($password, PASSWORD_DEFAULT);
    $requete = $connexion->prepare("INSERT INTO users(nomUser, prenomUser, loginUser, passwordUser, mailUser)
VALUES (:nom, :prenom, :login, :password, :mail)");
    $requete->bindParam('nom', $nom);
    $requete->bindParam('prenom', $prenom);
    $requete->bindParam('login', $login);
    $requete->bindParam('password', $password);
    $requete->bindParam('mail', $mail);
    $requete->execute();
    return $connexion->lastInsertId();
}

function getUserByLogin($login){
    $connexion =createConnection();
    $requete = $connexion->prepare("SELECT * FROM users  WHERE loginUser = :login");
    $requete->bindParam('login', $login);
    $requete -> execute();
    return $requete->fetch(PDO::FETCH_ASSOC);
}
