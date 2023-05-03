<?php

class Auteur{
    private string $nom;
    private string $prenom;

    public function __construct(string $nom, string $prenom){
        $this->prenom = $prenom;
        $this->nom = $nom;
}

}