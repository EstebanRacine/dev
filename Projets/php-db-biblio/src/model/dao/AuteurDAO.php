<?php

require_once "./src/model/entites/Auteur.php";
require_once "./src/model/config/Database.php";

//CETTE CLASSE PERMET DE FAIRE DU CRUD ET DU MAPPING OBJET RELATIONNEL
class AuteurDAO{

//    METHODE DE RECHERCHE
    /**
     * @return Auteur[]
     */
    public function findAll():array{
//        CONNEXION AVEC BDD
        $connexion = Database::getConnection();
//        RECUPERER ENREGISTREMENTS
        $connexion->prepare("SELECT * FROM auteur");


//        MAPPER LES ENREGISTREMENTS VERS DES OBJETS


//        RETOURNER RESULTAT


    }
}