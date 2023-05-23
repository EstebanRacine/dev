<?php

use usecase\rechercherParNomAuteur\RechercherParNomAuteur;

require_once "./src/model/usecase/rechercherParNomAuteur/RechercherParNomAuteur.php";

$rechercheParAuteur = new RechercherParNomAuteur();
print_r($rechercheParAuteur->execute("Dahl"));