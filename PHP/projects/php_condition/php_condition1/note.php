<?php
$note = readline("Saisir une note :");

/*if($note > 10){
    echo "BRAVO vous avez la moyenne";
} else {
    if ($note == 10){
        echo "Bien joué, t'as juste la moyenne";
    } else {
        echo "Non là c'est chaud.";
    }
}*/

if($note > 10){
    echo "BRAVO vous avez la moyenne";
} elseif($note == 10){
    echo "Juste la moyenne c'est dejà pas mal";
} else {
    echo "Non là c'est chaud";
};