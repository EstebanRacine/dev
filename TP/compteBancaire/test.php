<?php

require "CompteBancaire.php";

$compte = new CompteBancaire("Esteban Racine", 100, "2013-03-28");
$compte2 = new CompteBancaire("Arthur Ly", 1, "2019-02-03");

$compte->addSolde(250.36);


if($compte->virement(351.36, $compte2)){
    echo "Virement effectué.".PHP_EOL;
}else{
    echo "Virement impossible, somme trop élevée".PHP_EOL;
}
echo $compte->consulterCompte();
echo $compte2->consulterCompte();