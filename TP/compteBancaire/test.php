<?php

require "CompteBancaire.php";

$compte = new CompteBancaire("Esteban Racine", 100, "2013-03-28");



$compte->addSolde(250.36);
echo $compte->consulterCompte();
echo $compte->isGold();