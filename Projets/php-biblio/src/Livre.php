<?php

class Livre{
    private string $isbn;
    private string $titre;
    private int $nbPages;
    private DateTime $dateParution;
    private Auteur $auteur;


    public function __construct(string $isbn, string $titre, int $nbPages, DateTime $dateParution, Auteur $auteur){
        $this->titre = $titre;
        $this->isbn = $isbn;
        $this->dateParution = $dateParution;
        $this->nbPages = $nbPages;
        $this->auteur = $auteur;
    }

}