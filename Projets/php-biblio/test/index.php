<?php

require_once "../src/Auteur.php";
require_once "../src/Livre.php";
require_once "../src/Editeur.php";
require_once "../src/Categorie.php";

$orwell = new Auteur("Orwell", "Georges");
$hachette = new Editeur("Hachette", "Bordeaux");
$roman = new Categorie("Roman");

$fermeAnimaux = new Livre("2851841203", "La Ferme des Animaux", 92, date_create_from_format("d/m/Y",
    "17/08/1945"), $orwell, $roman, $hachette);

$auteur = $fermeAnimaux->getAuteur();
echo $auteur->getId().PHP_EOL;
echo PHP_EOL.$fermeAnimaux->getAllInfos().PHP_EOL;