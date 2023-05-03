<?php

//require_once "Livre.php";

class Auteur{
    private string $nom;
    private string $prenom;

//    /*
//     *  @var Livres[]
//     */
//    private array $livres;

    public function __construct(string $nom, string $prenom){
        $this->prenom = $prenom;
        $this->nom = $nom;
//        $this->livres = [];
    }

//    public function addLivre(Livre $livre):void{
//        $this->livres[] = $livre;
//        $livre->setAuteur($this);
//    }

}