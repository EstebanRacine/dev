<?php

require 'constantes.php';

// **************************************************
// Déclaration des variables
// **************************************************
const POSITION_VIDE = '-';

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
function getGrille(array $grille)
{
    $numerosColonne = str_repeat(' ', 5);
    for ($i = 0; $i < count($grille[0]); $i++) {
        $numerosColonne .= BLUE . sprintf('%02d  ', $i) . RESET;
    }
    $numerosColonne .= PHP_EOL;
    echo $numerosColonne;

    $lignes = '';
    foreach ($grille as $numero => $ligne) {
        $uneLigne = BLUE . sprintf('%02d', $numero) . RESET;
        foreach ($ligne as $position) {
            $uneLigne .= ' | ' . YELLOW . POSITION_VIDE . RESET;
        }
        $lignes .= $uneLigne . ' | ' . PHP_EOL;
    }
    echo $lignes;
}

getGrille(creerGrille(23, 3));