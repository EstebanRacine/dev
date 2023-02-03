<?php
$ecritRouge = "\033[31m";
$ecritBleu = "\033[34m";
$fondRouge = "\033[41m";
$fondVert = "\033[42m";
$ecritNormal = "\033[0m";
$distance = readline("Quel est la distance parcourue ?");
if(is_numeric($distance) == False){
    echo $ecritRouge."La distance n'est pas un nombre valide".$ecritNormal;
    exit;
};
$temps = readline("Combien de temps a duré le trajet ? (format : H:m) ");
$heure = substr($temps, 0, -3);
$minute = substr($temps, -2);
$booleenNumeric = False;
if(is_numeric($heure) and is_numeric($minute) and substr($temps, -3, 1)==":"){
    $booleenNumeric = True;
};
if($booleenNumeric == False){
    echo $ecritRouge."Le temps ne suit pas la forme demandée".$ecritNormal;
    exit;
}
$heure = intval($heure);
$minute = intval($minute);
if($minute > 59){
    echo $ecritRouge."Heure invalide (les minutes ne peuvent dépasser 59)".$ecritNormal;
    exit;
}
echo PHP_EOL;
$vitesse = ceil($distance/(($heure*3600 + $minute*60)/3600));
echo "La vitesse moyenne était de $vitesse km/h";
echo PHP_EOL;
if($vitesse <= 90){
    echo $fondVert."Vous êtes en dessous de 90 km/h".$ecritNormal;
} else {
    echo $fondRouge."Vous êtes au dessus de 90 km/h".$ecritNormal;
}