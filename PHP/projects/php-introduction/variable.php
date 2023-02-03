<?php
$prenom = "Esteban";
echo $prenom."\n";
function dernierElementTableau($tab){
    if(count($tab)==0){
        return null;
    }
    $lastIndice = array_key_last($tab);
    return $tab[$lastIndice];
};
$fleurs = ["rose", "pissenlit", "marguerite"];

echo dernierElementTableau($fleurs);
echo PHP_EOL;
echo end($fleurs);
echo PHP_EOL;
echo array_search("marguerite", $fleurs);
echo PHP_EOL;
echo array_key_last($fleurs);
echo PHP_EOL;
echo strlen($prenom);
echo PHP_EOL;

function parcourir($tab){
    foreach($tab as $valeur){
        echo $valeur;
        echo PHP_EOL;
    }
};

echo PHP_EOL;

foreach(range(0, 12) as $chiffre){
    echo $chiffre;
    echo PHP_EOL;
};

echo PHP_EOL;

function plusGrand($tab){
    $max = $tab[0];
    foreach($tab as $val){
        if($max < $val){
            $max = $val;
        };
    };
    return $max;
};

$tabChiffre = [0, 5, 6, 8, 1, 2, 52, 63];

$tabTest = str_split($prenom);

foreach($tabTest as $lettre){
    echo $lettre;
    echo PHP_EOL;
};

function password($password){
    $ArrayPass = str_split($password);
    $Num = 0;
    $Maj = 0;
    $Min = 0;
    foreach($ArrayPass as $lettre){
        if(is_numeric($lettre)){
            $Num += 1;
        };
        if(ctype_upper($lettre)){
            $Maj += 1;
        };
        if(ctype_lower($lettre)){
            $Min += 1;
        };
    }
    if($Num > 0 and $Min > 0 and $Maj > 0 and strlen($password) > 7){
        return "Le mot de passe est bon";
    }
    return "Le mot de passe ne convient pas";

};

echo password("Test5895");