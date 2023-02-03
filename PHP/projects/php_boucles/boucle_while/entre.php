<?php
$min = intval(readline("Quel est le minimum ?"));
$max = intval(readline("Quel est le maximum ?"));
$compteur = $min;
while($compteur != $max+1){
    if($compteur%15 == 0){
        echo "$compteur FizzBuzz";
    } elseif($compteur%5 == 0){
        echo "$compteur Buzz";
    } elseif($compteur%3 == 0){
        echo "$compteur Fizz";
    } else {
        echo $compteur;
    }
    echo PHP_EOL;
    $compteur += 1;
}