<?php
$nbTour = rand(5, 20);
echo "Vous avez $nbTour tentatives pour trouver le nombre caché.";
echo PHP_EOL;
$ATrouver = rand(1, 100);
for ($i=1; $i <= $nbTour; $i++){
    $propositionUtilisateur = intval(readline("Quel est le chiffre mystère ?"));
    if ($propositionUtilisateur == $ATrouver){
        echo "Bien joué le nombre était bien $ATrouver , vous avez trouvé en $i coups.";
        exit;
    } elseif ($propositionUtilisateur < $ATrouver){
        echo "C'est plus !";
        echo PHP_EOL;
        $nbCoupsRestants = $nbTour - $i;
        echo "Il vous reste $nbCoupsRestants coups";
        echo PHP_EOL;
    } else {
        echo "C'est moins !";
        echo PHP_EOL;
        $nbCoupsRestants = $nbTour - $i;
        echo "Il vous reste $nbCoupsRestants coups";
        echo PHP_EOL;
    }
}
echo "Vous n'avez pas trouvé... Le nombre était $ATrouver";