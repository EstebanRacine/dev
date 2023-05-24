<?php

require_once "../src/Formation.php";

$formation = new Formation("Formation aux dangers informatiques", 3, date_create_from_format("d/m/Y", "05/02/2023"), date_create_from_format("d/m/Y", "07/02/2023"));
$entreprise = new Entreprise("TConcept", "rue du Muguet", "25000", "Besancon");
$salarie = new Salarie("Arthur", "Ly", $entreprise);

echo $formation->inscrireSalarie($salarie).PHP_EOL;
echo $formation->inscrireSalarie($salarie).PHP_EOL;
echo $formation->noterSalarie($salarie, 15.5, "Pas mal mais Esteban a fait mieux");

//var_dump($formation);