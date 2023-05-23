<?php

require_once "./src/model/entites/Livre.php";
require_once "./src/model/config/Database.php";
require_once "AuteurDAO.php";

//CETTE CLASSE PERMET DE FAIRE DU CRUD ET DU MAPPING OBJET RELATIONNEL
class LivreDAO{

//    METHODE DE RECHERCHE
    /**
     * @return Livre[]
     */
    public function findAll():array{
//        CONNEXION AVEC BDD
        $connexion = Database::getConnection();
//        RECUPERER ENREGISTREMENTS
        $requete = $connexion->prepare("SELECT * FROM livre INNER JOIN auteur a on livre.idAuteur = a.idAuteur");
        $requete->execute();
        $livresDB = $requete->fetchAll(PDO::FETCH_ASSOC);
        //        MAPPER LES ENREGISTREMENTS VERS DES OBJETS
        $livres = [];
        foreach ($livresDB as $livreDB){
            $livres[] = $this->toObject($livreDB);
        }
//        RETOURNER RESULTAT
        return $livres;

    }

    public function searchISBN(string $isbn):Livre{
//        CONNEXION AVEC BDD
        $connexion = Database::getConnection();
//        RECUPERER ENREGISTREMENTS
        $requete = $connexion->prepare("SELECT * FROM livre INNER JOIN auteur ON livre.idAuteur = auteur.idAuteur WHERE isbn = :isbn");
        $requete->bindParam('isbn', $isbn);
        $requete->execute();
        $livresDB = $requete->fetchAll(PDO::FETCH_ASSOC);
        $livreDB = $livresDB[0];

        //        MAPPER LES ENREGISTREMENTS VERS DES OBJETS
        $livre = $this->toObject($livreDB);
//        RETOURNER RESULTAT
        return $livre;

    }

    public function searchNomAuteur(string $nom):array{
        $connexion = Database::getConnection();
        $requete = $connexion->prepare("SELECT * FROM livre INNER JOIN auteur a on livre.idAuteur = a.idAuteur WHERE nomAuteur = :nom");
        $requete->bindParam('nom', $nom);
        $requete->execute();
        $livresDB = $requete->fetchAll(PDO::FETCH_ASSOC);
        $livres = [];
        foreach ($livresDB as $livreDB){
            $livres[] = $this->toObject($livreDB);
        }
        return $livres;
    }


    public function create(Livre $livre):void{
        $connexion = Database::getConnection();
        $requete = $connexion->prepare("INSERT INTO livre(isbn, titre, dateParution, nbPages, idAuteur) VALUES 
                                                                    (:isbn, :titre, :dateParution, :nbPages, :idAuteur)");
        $requete->bindValue('isbn', $livre->getIsbn());
        $requete->bindValue('titre', $livre->getTitre());
        $requete->bindValue('nbPages', $livre->getNbPages());
        $requete->bindValue('dateParution', $livre->getDateParution()->format("Y-m-d"));
        $requete->bindValue('idAuteur', $livre->getAuteur()->getId());
        $requete->execute();
    }

    public function delete(int $isbn):void{
        $connexion = Database::getConnection();
        $requete = $connexion->prepare("DELETE FROM livre WHERE isbn = :isbn");
        $requete->bindParam('isbn', $isbn);
        $requete->execute();
    }

    /**
     * @param mixed $livreDB
     * @return Livre
     */
    public function toObject(array $livreDB): Livre
    {
        $livre = new Livre();
        $livre->setIsbn($livreDB['isbn']);
        $livre->setDateParution(date_create_from_format("Y-m-d", $livreDB['dateParution']));
        $livre->setNbPages($livreDB['nbPages']);
        $livre->setTitre($livreDB['titre']);
        $auteur = new Auteur();
        $auteur->setId($livreDB['idAuteur']);
        $auteur->setPrenomAuteur($livreDB['prenomAuteur']);
        $auteur->setNomAuteur($livreDB['nomAuteur']);
        $livre->setAuteur($auteur);
        return $livre;
    }


}