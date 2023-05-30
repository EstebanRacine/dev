<?php

require_once "./src/model/entites/Utilisateur.php";
require_once "./src/model/entites/Livre.php";
require_once "./src/model/entites/Emprunt.php";
require_once "./src/model/config/Database.php";
require_once "LivreDAO.php";
require_once "UtilisateursDAO.php";


class EmpruntDAO{

    public function findAll():array{
//        CONNEXION AVEC BDD
        $connexion = Database::getConnection();
//        RECUPERER ENREGISTREMENTS
        $requete = $connexion->prepare("SELECT * FROM ((emprunt INNER JOIN livre l on emprunt.livreEmprunt = l.isbn) INNER JOIN auteur ON l.idAuteur=auteur.idAuteur) INNER  JOIN utilisateurs ON userEmprunt = utilisateurs.idUser");
        $requete->execute();
        $empruntsDB = $requete->fetchAll(PDO::FETCH_ASSOC);
        //        MAPPER LES ENREGISTREMENTS VERS DES OBJETS
        $emprunts = [];
        foreach ($empruntsDB as $empruntDB){
            $emprunts[] = $this->toObject($empruntDB);
        }
//        RETOURNER RESULTAT
        return $emprunts;
    }

    public function findByUserId(int $id){
        $connexion = Database::getConnection();
        $requete = $connexion->prepare("SELECT * FROM ((emprunt INNER JOIN livre l on emprunt.livreEmprunt = l.isbn) INNER JOIN auteur ON l.idAuteur=auteur.idAuteur) INNER  JOIN utilisateurs ON userEmprunt = utilisateurs.idUser WHERE idUser = :id");
        $requete->bindParam('id', $id);
        $requete->execute();
        $empruntsDB = $requete->fetchAll(PDO::FETCH_ASSOC);
        $emprunts = [];
        foreach ($empruntsDB as $empruntDB){
            $emprunts[] = $this->toObject($empruntDB);
        }
        return $emprunts;
    }

    public function create(Utilisateur $user, Livre $livre){
        $connexion = Database::getConnection();
        $requete = $connexion->prepare("INSERT INTO emprunt(dateEmprunt, userEmprunt, livreEmprunt) VALUES (:date, :idUser, :isbn)");
        $requete->bindValue('date', date("Y-m-d"));
        $requete->bindValue('idUser', $user->getIdUser());
        $requete->bindValue('isbn', $livre->getIsbn());
        $requete->execute();
    }

    public function toObject($empruntDB){
        $livreDAO = new LivreDAO();
        $userDAO = new UtilisateursDAO();
        $emprunt = new Emprunt();
        $emprunt->setIdEmprunt($empruntDB['idEmprunt']);
        $emprunt->setDateEmprunt(date_create_from_format('Y-m-d', $empruntDB['dateEmprunt']));
        $emprunt->setUser($userDAO->toObject($empruntDB));
        $emprunt->setLivre($livreDAO->toObject($empruntDB));
        return $emprunt;
    }

}
