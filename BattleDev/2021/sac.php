<?php
$tailleSac = readline("Quel est le poids supporté par le sac ?");
if($tailleSac < 1 or $tailleSac >100){
    echo "La taille n'est pas valide";
} else {
    for($i = 0; $i < 5; $i++){
        $poidsObjet = readline("Quel est le poids de l'objet ?");
        $tailleSac -= $poidsObjet;
    }
    if($tailleSac<0){
        echo "NO";
    } else {
        echo "YES";
    }
}