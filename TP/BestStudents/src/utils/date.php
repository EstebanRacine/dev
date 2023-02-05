<?php

function naissance(string $date_n):string{
    $annee = substr($date_n, 0, 4);
    $month = substr($date_n, 5, 2);
    if($month == "01"){
        $month = "Janvier";
    }elseif($month == "02"){
        $month = "Février";
    }elseif ($month == "03"){
        $month = "Mars";
    }elseif ($month == "04"){
        $month = "Avril";
    }elseif ($month == "05"){
        $month = "Mai";
    }elseif ($month == "06"){
        $month = "Juin";
    }elseif ($month == "07"){
        $month = "Juillet";
    }elseif ($month == "08"){
        $month = "Aout";
    }elseif ($month == "09"){
        $month = "Septembre";
    }elseif ($month == "10"){
        $month = "Octobre";
    }elseif ($month == "11"){
        $month = "Novembre";
    }else{
        $month = "Décembre";
    }
    $day = substr($date_n, -2);
    return $day." ".$month." ".$annee;
}

print_r(naissance("2004-01-08"));