<?php

require "vendor/autoload.php";

use App\{Equipe, Championnat};
use League\Csv\Reader;

$csv = Reader::createFromPath('fichiers/Ligue1.csv','r');
$csv->setDelimiter(';');
$csv->setHeaderOffset(0);

$header = $csv->getHeader();
$records = $csv->getRecords();

$ligue1 = new Championnat('Ligue 1');
foreach ($records as $record){
    $equipe = new Equipe($record["Nom"],$record["Entraineur"],$record["Annee creation"]);
    $ligue1->ajouterEquipe($equipe);
}

dump($ligue1);