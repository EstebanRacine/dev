<?php

function declareIdentite(string $prenom, string $nom):string{
    return ucfirst(strtolower($prenom))." ".ucfirst(strtolower($nom));
}

$prenom = readline("Donnez votre prénom ");
$nom = readline("Donnez votre nom ");
echo "Votre identité est ".declareIdentite($prenom, $nom);