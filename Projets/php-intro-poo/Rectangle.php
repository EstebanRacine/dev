<?php

class Rectangle{

    private int $longueur;
    private int $largeur;

    public function __construct(int $longueur, int $largeur){

        $this->longueur = $longueur;
        $this->largeur = $largeur;
    }

    public function calculAire():int{
        return $this->longueur*$this->largeur;
    }

//ACCESSEURS

    public function getLongueur():int{
        return $this->longueur;
    }

    public function getLargeur():int{
        return $this->largeur;
    }

//MUTATEURS

    public function setLargeur(int $largeur):void
    {
        if ($largeur>=0) {
            $this->largeur = $largeur;
        }else{
            echo PHP_EOL."La largeur doit être positive pour être modifiée.".PHP_EOL;
        }
    }

    public function setLongueur(int $longueur):void
    {
        if ($longueur) {
            $this->longueur = $longueur;
        }else{
            echo PHP_EOL."La longueur doit être positive pour être modifiée.".PHP_EOL;
        }
    }

}

