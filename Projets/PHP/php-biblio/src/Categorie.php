<?php

class Categorie{
    private string $libelle;

    public function __construct(string $lib){
        $this->libelle = $lib;
    }


    public function getLibelle(): string
    {
        return $this->libelle;
    }
}