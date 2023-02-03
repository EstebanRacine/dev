<?php

require 'fonctions.php';
effacerEcran();
$grille = creerGrille(LARGEUR, HAUTEUR);
$positionHero=placerHero($grille);
$positionHero[] = rand(LARGEUR*HAUTEUR*1.2, LARGEUR*HAUTEUR*1.8);
$energie = $positionHero[2];
$x = $positionHero[0];
$y = $positionHero[1];
placerObstacles($grille);
placerArrivee($grille);
echo YELLOW."Vous avez $energie points d'énergie".RESET;
echo getGrille($grille);
$choix = strtoupper(readline(YELLOW."Deplacement de ".NOMHERO." :N, S, E, O, Q-> Quitter ".RESET));
while ($choix != 'Q'){
    if ($choix == "N"){
        $retour = DeplacementNord($grille, $positionHero);
    } elseif ($choix =="S"){
        $retour = DeplacementSud($grille, $positionHero);
    }elseif ($choix=="E"){
        $retour = DeplacementEst($grille, $positionHero);
    }else{
        $retour = DeplacementOuest($grille, $positionHero);
    }
    echo $energie.PHP_EOL;
    $energie = $positionHero[2];
    echo $energie.PHP_EOL;
    if(gettype($retour)=="string"){
        echo $retour.PHP_EOL;
    } else {
        $energie -= rand(1, 5);
        $positionHero[2] = $energie;
    }
    if($energie <= 0){
        echo RED."Vous êtes épuisé. Fin de partie.".RESET;
        exit;
    }
    echo YELLOW."Il vous reste $energie points d'énergie".RESET.PHP_EOL;
    echo getGrille($grille).PHP_EOL;
    $choix = strtoupper(readline(YELLOW."Deplacement de ".NOMHERO." :N, S, E, O, Q-> Quitter ".RESET));
}
echo PHP_EOL;
echo "Au revoir (même pas fini le jeu le boug)";
