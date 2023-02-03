<?php
$nombre1 = readline("Saisir un nombre entier : ");
$nombre2 = readline("Saisir un nombre entier : ");
if($nombre2 != 0){
$resultat = round($nombre1 / $nombre2,2);
echo "Le résultat de la division de $nombre1 par $nombre2 est $resultat";
} else {
    echo "On ne peut pas diviser par 0";
}