<?php
$capital = readline("Quel est le capital ?");
$taux = readline("Quel est le taux d'intérets ?")/100;
$temps = readline("Sur combien d'années s'étends-t-il ?")*12;
$calcA =($capital*$taux)/12;
$calcB = 1-(1+($taux/12))**-$temps;
$nbParMois = round($calcA/$calcB, 2);
echo "Le montant à payer par mois est de $nbParMois";
$nbCout = floor(($nbParMois*$temps)-$capital);
echo PHP_EOL;
echo "Le coup de l'emprunt sera de $nbCout";
