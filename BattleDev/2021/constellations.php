<?php
$cooConstellations = [];
$cooX = [];
$cooY = [];
$cooXPresent = [];
$cooYPresent = [];
$cooEtoilesPresentes = [];
for($i=0; $i<3; $i++ ){
    $cooCache = readline("Donnez les coordonnées");
    $cooEtoiles = explode(" ", $cooCache);
    if($cooEtoiles[0] < 25 and $cooEtoiles[0] >= 0 and  $cooEtoiles[1] < 25 and $cooEtoiles[1] >= 0){
        $cooX[] = $cooEtoiles[0];
        $cooY[] = $cooEtoiles[1];
        $cooConstellations[] = $cooCache;
    }
}
$NbEtoiles = intval(readline("Combien y a t-il d'étoiles ?"));
for($i=0; $i<$NbEtoiles; $i++ ){
    $cooCache = readline("Donnez les coordonnées");
    $cooEtoiles = explode(" ", $cooCache);
    if($cooEtoiles[0] < 100 and $cooEtoiles[0] >= 0 and  $cooEtoiles[1] < 100 and $cooEtoiles[1] >= 0){
        $cooXPresent[] = $cooEtoiles[0];
        $cooYPresent[] = $cooEtoiles[1];
        $cooEtoilesPresentes[] = $cooCache;
    }
}

for($i = 0; $i<count($cooEtoilesPresentes); $i++){
    $Etoile2 = $cooXPresent[$i]+($cooX[1]-$cooX[0]) . " " . $cooYPresent[$i]+($cooY[1]-$cooY[0]);
    $Etoile3 = $cooXPresent[$i]+($cooX[2]-$cooX[0]) . " " . $cooYPresent[$i]+($cooY[2]-$cooY[0]);
    if(in_array($Etoile2, $cooEtoilesPresentes) and in_array($Etoile3, $cooEtoilesPresentes)){
        echo $cooEtoilesPresentes[$i];
        echo PHP_EOL;
        echo $Etoile2;
        echo PHP_EOL;
        echo $Etoile3;
        exit;
    }
}
echo "NOT FOUND";