<?php

function incrementer(int& $nb):int{
    return $nb+=1;
}

$compteur = 0;
incrementer($compteur);
echo $compteur;