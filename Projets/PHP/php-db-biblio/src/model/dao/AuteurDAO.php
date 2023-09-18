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
            $auteur = $this->toObject($auteurDB);
            $auteurs[] = $auteur;
        }

//        RETOURNER RESULTAT
        return $auteurs;
    }

    public function findById(int $idAuteur) : ?Auteur{
        $connexion = Database::getConnection();
        $requete = $connexion->prepare("SELECT * FROM auteur WHERE idAuteur = :idAuteur");
        $requete->bindParam('idAuteur', $idAuteur);
        $requete->execute();
        $auteur = $requete->fetchAll(PDO::FETCH_ASSOC);
        if ($auteur===false){
            return null;
        }
        return $this->toObject($auteur[0]);
    }

    public function create(Auteur $auteur){
        $connexion = Database::getConnection();
        $requete = $connexion->prepare("INSERT INTO auteur(idAuteur, nomAuteur, prenomAuteur) VALUES (NULL, :nom, :prenom)");
        $requete->bindValue('nom', $auteur->getNomAuteur());
        $requete->bindValue('prenom', $auteur->getPrenomAuteur());
        $requete->execute();
    }


    public function delete(int $id) : void{
        $connexionLiv = Database::getConnection();
        $requeteLivre = $connexionLiv->prepare("DELETE FROM livre WHERE idAuteur = :idAut");
        $requeteLivre->bindParam('idAut', $id);
        $requeteLivre->execute();

        $connexionAut = Database::getConnection();
        $requete = $connexionAut->prepare("DELETE FROM auteur WHERE idAuteur = :id");
        $requete->bindParam('id', $id);
        $requete->execute();
    }


    public function update(Auteur $auteur) : void{
        $connexion = Database::getConnection();
        $requete = $connexion->prepare("UPDATE auteur SET nomAuteur = :nom, prenomAuteur = :prenom WHERE idAuteur = :id");
        $requete->bindValue('id', $auteur->getId());
        $requete->bindValue('nom', $auteur->getNomAuteur());
        $requete->bindValue('prenom', $auteur->getPrenomAuteur());
        $requete->execute();
    }




    /**
     * @param array $auteurDB
     * @return Auteur
     */
    private function toObject(array $auteurDB): Auteur
    {
        $auteur = new Auteur();
        $auteur->setId($auteurDB['idAuteur']);
        $auteur->setNomAuteur($auteurDB['nomAuteur']);
        $auteur->setPrenomAuteur($auteurDB['prenomAuteur']);
        return $auteur;
    }
}