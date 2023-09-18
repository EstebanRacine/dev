<?php

class Editeur{
    private string $nom;
    private string $ville;

    public function __construct(string $nom, string $ville){
        $this->ville = $ville;
        $this->nom = $nom;
    }

    public function getInfos():string{
        return $this->nom." à ".$this->ville;
    }

}