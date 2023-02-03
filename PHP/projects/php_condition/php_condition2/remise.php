<?php
$prix = readline("Quel est le prix ? ");
if($prix <1000){
    $remise = $prix*0.05;
} elseif($prix >= 5000){
    $remise = $prix*0.2;
} else {
    $remise = $prix*0.1;
};
$remise = round(floatval($remise), 2);
echo "La remise est de $remise";
echo PHP_EOL;
echo "Donc le prix après remise est de ".round(floatval($prix-$remise), 2);