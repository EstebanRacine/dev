<?php

require_once "../src/Auteur.php";
require_once "../src/Livre.php";

$orwell = new Auteur("Orwell", "Georges");

$fermeAnimaux = new Livre("2851841203", "La Ferme des Animaux", 92, date_create_from_format("d/m/Y",
    "17/08/1945"), $orwell);

$auteur = $fermeAnimaux->getAuteur();
echo $auteur->getId().PHP_EOL;
echo PHP_EOL.$fermeAnimaux->getAllInfos().PHP_EOL;