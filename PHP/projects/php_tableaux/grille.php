<?php
$x = readline("Quelle est la largeur ?");
$y = readline("Quelle est la hauteur ?");
$Bleu = "\033[34m";
$Jaune = "\033[33m";
$Base = "\033[0m";
$grille = [];
const POSITION_VIDE = "*";

for($i = 0; $i<$y; $i++){
    $cache = [];
    for($j = 0; $j<$x; $j++){
        $cache[] = POSITION_VIDE;
    }
    $grille[] = $cache;
}

$firstLigne = "     ";
for($k = 0; $k<$x;$k++){
    $firstLigne = $firstLigne.sprintf("%'.02d ", $k)." ";
}
$firstLigne = $Bleu.$firstLigne."\n".$Base;



echo $firstLigne;
foreach($grille as $key => $ligne){
    $nbAffichage = $Bleu.sprintf("%'.02d ", $key).$Base;
    echo $nbAffichage."| ";
    $listeValeur = implode(" | ", $ligne);
    echo $listeValeur." |";
    echo PHP_EOL;

}