<?php
$tableau = [];
$pourcent = 0;
echo "début du traitement";
echo PHP_EOL;
for ($i=0; $i <= 100000000; $i++) {
    $pourcentActuel = $i*100/100000000;
    //$tableau[] = 1;
    if($pourcentActuel == $pourcent+1 and $pourcentActuel != 100){
        $pourcent = $pourcentActuel;
        echo "En cours ". "\033[31m$pourcent % \033[0m" . "\r";
    }
    if($pourcentActuel == $pourcent+1 and $pourcentActuel == 100){
        echo "\033[32m100 %        \033[0m";
    }
}
echo PHP_EOL;
echo "fin du traitement";
