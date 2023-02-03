<?php
$nombreCache = intval(readline("Quel est le chiffre que l'ordinateur doit deviner ?"));
while($nombreCache < 0 || $nombreCache >1000){
    $nombreCache = intval(readline("Le nombre doit être entre 0 et 1000"));
}
/* Recherche basique */
$nbTentatives = 0;
$avantSimple = microtime(true);
while(random_int(0, 1000) != $nombreCache){
    $nbTentatives +=1;
    /*if($nbTentatives > 200){
        echo "Le programme n'a pas trouvé en moins de 200 coups";
        exit;
    }*/
}
echo "Le nombre à deviner à été trouvé en $nbTentatives coups avec la manière basique.";
echo PHP_EOL;
$apresSimple = microtime(true);
$tempsSimple = $apresSimple - $avantSimple;
/* Recherche dichotomique*/
$avantDicho = microtime(true);
$a = 0;
$b = 1000;
$x = random_int($a, $b);
while($x != $nombreCache){
    if($x < $nombreCache){
        $a = $x+1;
    } else {
        $b = $x-1;
    }
    $x = random_int($a, $b);
}
$apresDicho = microtime(true);
$tempsDicho = $apresDicho - $avantDicho;
echo "Le temps simple est $tempsSimple et le temps en dichotomique est $tempsDicho";