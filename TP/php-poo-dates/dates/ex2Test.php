<?php

/*
 * Exercice 2 : création d'objets DateTime
 */

// Créer un objet DateTime avec la date du 22/06/2019 à 9h15
$date = DateTime::createFromFormat("Y-m-d H:i", "2019-06-22 9:15");
// La date sera exprimée au format "aaaa-mm-jj hh:mm"

// Afficher la date au format "jj/mm/aaaa hh:mm"
echo $date->format("d/m/Y H:i");
echo PHP_EOL;
// Créer un objet DateTime avec la date du 22/06/2019 à 9h15
$dateBis = DateTime::createFromFormat("d/m/Y H:i", "22/06/2019 9:15");

// La date sera exprimée au format "jj/mm/aaaa hh:mm"

// Afficher la date au format jj/mm/aaaa hh:mm
echo $dateBis->format("d/m/Y H:i");
echo PHP_EOL;
