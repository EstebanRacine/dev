<?php
$PrixHT = readline("Quel est le prix hors taxe ?");
$TVA = readline("Quel est le taux de TVA ?");
$PrixHT += round($PrixHT*($TVA/100), 2);
echo "Le prix TTC est de : $PrixHT";