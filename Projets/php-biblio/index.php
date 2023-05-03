<?php

include_once "src/Auteur.php";
include_once "src/Livre.php";

$orwell = new Auteur("Orwell", "Georges");

$fermeAnimaux = new Livre("2851841203", "La Ferme des Animaux", 92, date_create_from_format("d/m/Y",
    "17/08/1945"), $orwell);

$orwell->addLivre($fermeAnimaux);

var_dump($fermeAnimaux);