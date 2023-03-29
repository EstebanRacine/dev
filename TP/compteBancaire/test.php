<?php

require "CompteBancaire.php";

$compte = new CompteBancaire(250, "Esteban Racine", 100, "2013-03-30");
echo $compte->isGold();
