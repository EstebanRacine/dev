<?php
$saveLecture = fopen("save.txt", "r");
$nbParties = fgets($saveLecture);
$nbParties = intval($nbParties);
fclose($saveLecture);
while(true){
echo PHP_EOL;
echo PHP_EOL;
echo "1 : Nouvelle Partie";
echo PHP_EOL;
echo "2 : Afficher votre nombre de parties";
echo PHP_EOL;
echo "3 : Quitter";
echo PHP_EOL;
$NumeroJoueur = intval(readline("Que voulez vous faire ?"));
echo PHP_EOL;
if($NumeroJoueur == 3){
    echo "Au revoir";
    exit;
} elseif ($NumeroJoueur == 2){
    echo "Vous avez fait $nbParties parties.";
} else {
    $saveModif = fopen("save.txt", "w");
    $nombreCache = intval(readline("Quel est le chiffre que l'ordinateur doit deviner ?"));
    while($nombreCache < 0 || $nombreCache >1000){
        $nombreCache = intval(readline("Le nombre doit être entre 0 et 1000"));
    }
    $nbTentatives = 0;
    while(random_int(0, 1000) != $nombreCache){
        $nbTentatives +=1;
    }
    echo "Le nombre à deviner à été trouvé en $nbTentatives coups avec la manière basique.";
    echo PHP_EOL;
    $nbParties += 1;
    fwrite($saveModif, strval($nbParties));
    fclose($saveModif);
}
}
