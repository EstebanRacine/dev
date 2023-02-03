<?php

function afficherTab(array $tab):void{
    foreach($tab as $element){
        echo $element.PHP_EOL;

    }
}

function getPair(array $tab):array{
    foreach ($tab as $element){
        if($element%2==0){
            $pair[] = $element;
        }
    }
    return $pair;
}



$tab = [10, 'toto', 'test'];
$tab2 = [2, 8, 9, 7, 5, 4, 13, 16];

afficherTab(getPair($tab2));