<?php

function verifMail($email){
    $parties = explode("@", $email);
    echo PHP_EOL;
    $taille = count($parties);
    if($taille == 1 or $taille > 2){
        return "Adresse non valide, il faut 1 arobase.";
    };
    $local = $parties[0];
    $serveur = $parties[1];
    if(strlen($local) == 0 or strlen($serveur) == 0){
        return "Adresse non valide, les parties locales et serveurs ne peuvent être vide.";
    };
    foreach(range(0, strlen($email)-1) as $indiceCaractere){
        if($email[$indiceCaractere]=="." and $email[$indiceCaractere+1]=="."){
            return "Adresse non valide, il y a 2 points à la suite.";
        };
    };
    if($local[-1]=="." or $serveur[0] == "."){
        return "Adresse non valide, les caractères collés au arobase ne peuvent être des points.";
    };
    $pointPresentServeur = False;
    $serveur = str_split($serveur);
    foreach($serveur as $caractereInServeur){
        if($caractereInServeur == "."){
            $pointPresentServeur = True;
        };
    };
    if($pointPresentServeur == False){
        return "Adresse non valide, il faut au moins un point dans la partie serveur.";
    };
    return "Adresse valide";

};
