<?php

require_once "./src/model/entites/Utilisateur.php";
require_once "./src/model/entites/Emprunt.php";
require_once "./src/model/config/Database.php";
require_once "LivreDAO.php";
require_once "EmpruntDAO.php";


class UtilisateursDAO{

    public function findAll():array{
//        CONNEXION AVEC BDD
        $connexion = Database::getConnection();
//        RECUPERER ENREGISTREMENTS
        $requete = $connexion->prepare("SELECT * FROM utilisateurs");
        $requete->execute();
        $usersDB = $requete->fetchAll(PDO::FETCH_ASSOC);
        //        MAPPER LES ENREGISTREMENTS VERS DES OBJETS
        $users = [];
        foreach ($usersDB as $userDB){
            $users[] = $this->toObject($userDB);
        }
//        RETOURNER RESULTAT
        return $users;
    }

    public function findById(int $id){
        $connexion = Database::getConnection();
        $requete = $connexion->prepare("SELECT * FROM utilisateurs WHERE idUser = :id");
        $requete->bindParam('id', $id);
        $requete->execute();
        $user = $requete->fetchAll(PDO::FETCH_ASSOC);
        return $this->toObject($user[0]);
    }


    public function toObject($userDB){
        $user = new Utilisateur();
        $user->setIdUser($userDB['idUser']);
        $user->setNomUser($userDB['nomUser']);
        $user->setPrenomUser($userDB['prenomUser']);
        return $user;
    }

}
