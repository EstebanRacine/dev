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
        $requete = $connexion->prepare("SELECT * FROM livre");
        $requete->execute();
        $livresDB = $requete->fetchAll(PDO::FETCH_ASSOC);
        //        MAPPER LES ENREGISTREMENTS VERS DES OBJETS
        $livres = [];
        foreach ($livresDB as $livreDB){
            $livre = new Livre();
            $livre->setIsbn($livreDB['isbn']);
            $livre->setDateParution(date_create_from_format("Y-m-d", $livreDB['dateParution']));
            $livre->setNbPages($livreDB['nbPages']);
            $livre->setTitre($livreDB['titre']);
            $auteur = new AuteurDAO();
            $livre->setAuteur($auteur->findById($livreDB['idAuteur']));
            $livres[] = $livre;
        }
//        RETOURNER RESULTAT
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


}