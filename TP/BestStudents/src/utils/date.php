<?php

function writeBirth(string $date_n):string{
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

function isMajeur(string $date_n){
    $timestampLimiteMajeur = time()-567993600;
    $timestampBirth = strtotime($date_n);
    if ($timestampBirth < $timestampLimiteMajeur){
        return True;
    }
    return False;
}

function getAge(string $date_n){
    $date_n = date_create($date_n);
    $now = date_create(date('Y-m-d'));
    $differenceDate = date_diff($date_n, $now);
    return $differenceDate->format("%y");
}

