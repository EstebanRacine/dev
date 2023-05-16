<?php

require_once "Auteur.php";
require_once "Editeur.php";
require_once "Categorie.php";

class Livre{
    private  string $isbn;
    private string $titre;
    private int $nbPages;
    private DateTime $dateParution;
    private Auteur $auteur;
    private Categorie $categorie;
    private Editeur $editeur;


    /**
     * @param string $isbn
     * @param string $titre
     * @param int $nbPages
     * @param DateTime $dateParution
     * @param Auteur $auteur
     */
    public function __construct(string $isbn, string $titre, int $nbPages, DateTime $dateParution, Auteur $auteur, Categorie $categorie, Editeur $editeur){
        $this->titre = $titre;
        $this->isbn = $isbn;
        $this->dateParution = $dateParution;
        $this->nbPages = $nbPages;
        $this->auteur = $auteur;
        $this->editeur = $editeur;
        $this->categorie = $categorie;
    }


    public function setAuteur(Auteur $auteur): void
    {
        $this->auteur = $auteur;
    }

    public function getIsbn(): string
    {
        return $this->isbn;
    }

    public function getTitre(): string
    {
        return $this->titre;
    }

    public function getNbPages(): int
    {
        return $this->nbPages;
    }

    public function getDateParution(): DateTime
    {
        return $this->dateParution;
    }

    public function getAuteur(): Auteur
    {
        return $this->auteur;
    }

    public function getAllInfos():string{
        $titre = "Titre : ".$this->titre.PHP_EOL;
        $isbn = "ISBN : ".$this->isbn.PHP_EOL;
        $nbPage = "Nb pages : ".$this->nbPages.PHP_EOL;
        $dateParu = "Date de parution : ". $this->dateParution->format("d/m/Y").PHP_EOL;
        $auteur = "Auteur : ".$this->auteur->getId().PHP_EOL;
        $editeur = "Editeur : ".$this->editeur->getInfos().PHP_EOL;
        $categorie = "Catégorie : ".$this->categorie->getLibelle().PHP_EOL;
        return $isbn.$titre.$auteur.$dateParu.$categorie.$nbPage.$editeur;
    }

}