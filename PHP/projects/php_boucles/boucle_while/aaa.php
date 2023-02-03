<?php
$min = intval(readline("Quel est le minimum ?"));
$max = intval(readline("Quel est le maximum ?"));
$compteur = $min;
while($compteur != $max+1){
    echo "$compteur ";
    if($compteur%3 == 0){
        echo "Fizz";
    }
    if($compteur%5 == 0){
        echo "Buzz";
    }
    echo PHP_EOL;
    $compteur += 1;
}