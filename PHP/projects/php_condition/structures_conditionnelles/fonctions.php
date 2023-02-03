<?php

function NomVille($adresseDepart){
    $adressePoubelle = explode(" ",$adresseDepart);
    $adressePoubelle = array_reverse($adressePoubelle);
    $villeDepart = "";
    $i=0;
    while (is_numeric($adressePoubelle[$i])!=True) { /* oublie pas arthur bg */
        if($i==0){
            $villeDepart = $adressePoubelle[$i];
            $i +=1;
        } else {
        $villeDepart = $adressePoubelle[$i]." ".$villeDepart;
        $i= $i+1;
        }
    }
    return $villeDepart;
}
