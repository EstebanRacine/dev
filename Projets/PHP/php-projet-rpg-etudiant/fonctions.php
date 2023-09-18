<?php

require 'constantes.php';

// Fonction permettant d'effacer l'écran
function effacerEcran() : void {
    echo chr(27).chr(91).'H'.chr(27).chr(91).'J';
}

// **************************************************
// Initialiser la grille avec des positions vides
// **************************************************

// Parcours de chaque ligne
function creerGrille(int $largeur, int $hauteur):array
{
    $grille = [];
    for ($i = 0; $i < $hauteur; $i++) {
        // Parcours de chaque colonne
        for ($j = 0; $j < $largeur; $j++) {
            $grille[$i][$j] = POSITION_VIDE;
        }
    }
    return $grille;
}
// **************************************************

// Afficher la grille
// **************************************************
function getGrille(array $grille):string
{
    $numerosColonne = str_repeat(' ', 5);
    for ($i = 0; $i < count($grille[0]); $i++) {
        $numerosColonne .= BLUE . sprintf('%02d  ', $i) . RESET;
    }
    $numerosColonne .= PHP_EOL;

    $lignes = '';
    foreach ($grille as $numero => $ligne) {
        $uneLigne = BLUE . sprintf('%02d', $numero) . RESET;
        foreach ($ligne as $cle=>$position) {
            if ($position == HERO){
                $x = $cle;
                $y = $numero;
                $uneLigne .= ' | ' . GREEN . HERO . RESET;
            }elseif ($position == OBSTACLE){
                $uneLigne .= ' | ' . RED . OBSTACLE . RESET;
            }elseif ($position == ARRIVEE){
                $uneLigne .= ' | ' . BLUE . ARRIVEE . RESET;
            }
            else {
                $uneLigne .= ' | ' . YELLOW . POSITION_VIDE . RESET;
            }
        }
        $lignes .= $uneLigne . ' | ' . PHP_EOL;
    }
    echo PHP_EOL.GREEN.NOMHERO." se trouve en ($x,$y)".RESET;
    echo PHP_EOL;
    return $numerosColonne.$lignes;
}

function placementAleatoire(string $caractere, array &$grille):array
{
        $hauteur = count($grille);
        $largeur = count($grille[0]);
        $x = rand(0, $largeur - 1);
        $y = rand(0, $hauteur - 1);
        while ($grille[$y][$x] != POSITION_VIDE) {
            $x = rand(0, $largeur-1);
            $y = rand(0, $hauteur-1);
        }
        $grille[$y][$x] = $caractere;
    return [$x, $y];
}

function placerHero(array &$grille): array
{
    return placementAleatoire(HERO, $grille);
}

function placerArrivee(array &$grille):void{
    placementAleatoire(ARRIVEE, $grille);
}

function placerObstacles(array &$grille):void{
    $largeur = count($grille[0]);
    $hauteur = count($grille);
    $repetition = ceil($largeur*$hauteur*15/100);
    for($i=0; $i<$repetition; $i++){
        placementAleatoire(OBSTACLE, $grille);
    }
}

function DeplacementNord(array &$grille, array &$positionHero):string|bool{
    $x = $positionHero[0];
    $y = $positionHero[1];
    if($grille[$y-1][$x]=="O"){
        effacerEcran();
        echo RED."/!\ Vous rencontrez un obstacle, voulez vous le franchir ?".RESET.PHP_EOL;
        $passage = strtoupper(readline("O pour oui/N pour non "));
        if ($passage == "N"){
            return RED."Veuillez choisir une autre direction".RESET;
        } else {
            $grille[$y-1][$x] = "H";
            echo PHP_EOL;
            $grille[$y][$x] = POSITION_VIDE;
            $positionHero = [$x, $y-1, $positionHero[2]-rand(1, 5)];
            effacerEcran();
        }
    }elseif($y-1<0){
        effacerEcran();
        return RED."ERREUR : La direction demandée est hors de la grille.".RESET;
    }elseif ($grille[$y-1][$x]=="A"){
        echo PHP_EOL;
        echo BLUE."BIEN JOUE !! VOUS AVEZ REUSSI !".RESET;
        echo PHP_EOL." ";
        exit;
    }else{
        $grille[$y-1][$x] = "H";
        echo PHP_EOL;
        $grille[$y][$x] = POSITION_VIDE;
        $positionHero = [$x, $y-1,$positionHero[2]];
        effacerEcran();
    }
    return true;
}

function DeplacementSud(array &$grille, array &$positionHero):string|bool{
    $x = $positionHero[0];
    $y = $positionHero[1];
    if($grille[$y+1][$x]=="O"){
        effacerEcran();
        echo RED."/!\ Vous rencontrez un obstacle, voulez vous le franchir ?".RESET.PHP_EOL;
        $passage = strtoupper(readline("O pour oui/N pour non "));
        if ($passage == "N"){
            return RED."Veuillez choisir une autre direction".RESET;
        } else {
            $grille[$y+1][$x] = "H";
            echo PHP_EOL;
            $grille[$y][$x] = POSITION_VIDE;
            $positionHero = [$x, $y+1,$positionHero[2]-rand(1, 5)];
            effacerEcran();
        }
    }elseif($y+1>=count($grille)){
        effacerEcran();
        return RED."ERREUR : La direction demandée est hors de la grille.".RESET;
    } elseif ($grille[$y+1][$x]=="A"){
        echo PHP_EOL;
        echo BLUE."BIEN JOUE !! VOUS AVEZ REUSSI !".RESET;
        echo PHP_EOL." ";
        exit;
    }else{
        $grille[$y+1][$x] = "H";
        $grille[$y][$x] = POSITION_VIDE;
        $positionHero = [$x, $y+1,$positionHero[2]];
        effacerEcran();
    }
    return true;
}

function DeplacementEst(array &$grille, array &$positionHero):bool|string{
    $x = $positionHero[0];
    $y = $positionHero[1];
    if($grille[$y][$x+1]=="O"){
        effacerEcran();
        echo RED."/!\ Vous rencontrez un obstacle, voulez vous le franchir ?".RESET.PHP_EOL;
        $passage = strtoupper(readline("O pour oui/N pour non "));
        if ($passage == "N"){
            return RED."Veuillez choisir une autre direction".RESET;
        } else {
            $grille[$y][$x+1] = "H";
            echo PHP_EOL;
            $grille[$y][$x] = POSITION_VIDE;
            $positionHero = [$x+1, $y,$positionHero[2]-rand(1, 5)];
            effacerEcran();
        }
    }elseif($x+1>=count($grille[0])){
        effacerEcran();
        return RED."ERREUR : La direction demandée est hors de la grille.".RESET;
    }elseif ($grille[$y][$x+1]=="A"){
        echo PHP_EOL;
        echo BLUE."BIEN JOUE !! VOUS AVEZ REUSSI !".RESET;
        echo PHP_EOL." ";
        exit;
    } else{
        $grille[$y][$x+1] = "H";
        $grille[$y][$x] = POSITION_VIDE;
        $positionHero = [$x+1, $y,$positionHero[2]];
        effacerEcran();
    }
    return true;
}

function DeplacementOuest(array &$grille, array &$positionHero):string|bool{
    $x = $positionHero[0];
    $y = $positionHero[1];
    if($grille[$y][$x-1]=="O"){
        effacerEcran();
        echo RED."/!\ Vous rencontrez un obstacle, voulez vous le franchir ?".RESET.PHP_EOL;
        $passage = strtoupper(readline("O pour oui/N pour non "));
        if ($passage == "N"){
            return RED."Veuillez choisir une autre direction".RESET;
        } else {
            $grille[$y][$x-1] = "H";
            echo PHP_EOL;
            $grille[$y][$x] = POSITION_VIDE;
            $positionHero = [$x-1, $y,$positionHero[2]-rand(-15, 5)];
            effacerEcran();
        }
    }elseif($x-1<0){
        effacerEcran();
        return RED."ERREUR : La direction demandée est hors de la grille.".RESET;
    } elseif ($grille[$y][$x-1]=="A"){
        echo PHP_EOL;
        echo BLUE."BIEN JOUE !! VOUS AVEZ REUSSI !".RESET;
        echo PHP_EOL." ";
        exit;
    }else{
        $grille[$y][$x-1] = "H";
        $grille[$y][$x] = POSITION_VIDE;
        $positionHero = [$x-1, $y,$positionHero[2]];
        effacerEcran();
    }
    return true;
}