<?php

function estPair(int $nb):bool{
    if($nb%2 == 0){
        return true;
    }
    return False;
}
$nb = readline();
echo EstPair($nb);
