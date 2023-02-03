<?php
$temps = readline("Quel est l'horaire demandé ?");
$heure = substr($temps, 0, 2);
if(substr($heure, 1) == ":"){
    $heure = substr($heure, 0, 1);    
}
$heure = intval($heure);
if(($heure >= 9 && $heure <= 11) || ($heure >= 14 && $heure <= 18)){
    echo "Le magasin est ouvert à $temps";
} else {
    echo "Le magasin est fermé à $temps";
}