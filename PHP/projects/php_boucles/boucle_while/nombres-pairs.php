<?php
$x = 0;
$nbUtilisateur = intval(readline("Quel est le nombre limite ?"));
while($x != 100 && $x <= $nbUtilisateur){
    if($x%2 == 0){
        echo $x;
        echo PHP_EOL;
    }
    $x += 1;
}