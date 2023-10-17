<?php

namespace App\Validateurs;

use App\Exceptions\NombreException;
use App\Exceptions\MotDePasseException;
use Exception;

class Validateur
{
    public function verifierNombre(int $nb):bool{
        //Tester si nombre est positif
        if($nb < 0){
            //Lancement d'une Exception
            throw new NombreException("Le nombre n'est pas positif.");
        }
        return True;
    }

    public function verifierMotDePasse($mdp):bool{
        //Verification de la longueur
        if (strlen($mdp) < 8){
            throw new MotDePasseException("Le mot de passe est trop court.");
        }

        //Vérifier si le mot de passe contient au moins une majuscule
        //Expression Régulière
        if(!preg_match('/[A-Z]/', $mdp)){
            throw new MotDePasseException("Le mot de passe doit contenir au minimum une majuscule.");
        }

        if(!preg_match('/[a-z]/', $mdp)){
            throw new MotDePasseException("Le mot de passe doit contenir au minimum une minuscule.");
        }

        if(!preg_match('/[0-9]/', $mdp)){
            throw new MotDePasseException("Le mot de passe doit contenir au minimum un chiffre.");
        }

        return True;
    }
}