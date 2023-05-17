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
        $requete = $connexion->prepare("SELECT * FROM auteur");
        $requete->execute();
        $auteursDB = $requete->fetchAll(PDO::FETCH_ASSOC);
        //        MAPPER LES ENREGISTREMENTS VERS DES OBJETS
        $auteurs = [];
        foreach ($auteursDB as $auteurDB){
            $auteur = new Auteur();
            $auteur->setId($auteurDB['idAuteur']);
            $auteur->setNomAuteur($auteurDB['nomAuteur']);
            $auteur->setPrenomAuteur($auteurDB['prenomAuteur']);
            $auteurs[] = $auteur;
        }

//        RETOURNER RESULTAT
        return $auteurs;

    }
}