<?php

require "vendor/autoload.php";

use App\{dossier1\Personne, Equipe, Championnat};

$ligue1 = new App\Championnat("Ligue 1");
echo $ligue1->getNom() . PHP_EOL;

//$psg = new Equipe("PSG", "Luis Enrique", "1978");
//$om = new Equipe("OM", "Marcelino","1899");
//$sochaux = new Equipe("Sochaux","Toto","1921");
//
//$ligue1->ajouterEquipe($psg);
//$ligue1->ajouterEquipe($om);
//$ligue1->ajouterEquipe($sochaux);

$ligue1->importerEquipesCSV("fichiers/Ligue1.csv");

echo "VOICI LES EQUIPES :".PHP_EOL;
foreach ($ligue1->getEquipes() as $equipe){
    echo "  - ".$equipe->getNom().PHP_EOL;
}
