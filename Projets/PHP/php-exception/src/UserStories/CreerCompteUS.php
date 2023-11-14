<?php

namespace App\UserStories;

use App\Exceptions\MotDePasseException;
use App\Validateurs\Validateur;

class CreerCompteUS
{
    /**
     * @throws MotDePasseException
     */
    public function execute(string $login, string $mdp):bool{
        // Login est-il unique ?
        // Mdp Valide

        $validateur = new Validateur();
        $validateur->verifierMotDePasse($mdp);
        return True;
    }
}