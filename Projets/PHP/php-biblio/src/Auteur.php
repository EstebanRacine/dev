<?php

class Auteur{
    private string $nom;
    private string $prenom;


    public function __construct(string $nom, string $prenom){
        $this->prenom = $prenom;
        $this->nom = $nom;
    }


    public function getNom(): string
    {
        return $this->nom;
    }

    public function getPrenom(): string
    {
        return $this->prenom;
    }

    public function getId() : string{
        return $this->prenom." ".$this->nom;
    }


}