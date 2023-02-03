<?php
$equipes = ['France','Brésil','Argentine','Espagne','Sénégal','Australie','Belgique'];
$equipeUtil = readline("Quel pays recherchez vous ?");
$present = False;
foreach($equipes as $pays){
    if($pays == $equipeUtil){
        echo "Le pays est présent";
        $present = True;
    }
}
if(!$present){
    echo "Le pays n'est pas présent";
}
echo PHP_EOL;
if(in_array($equipeUtil, $equipes)){
    echo "Le pays est présent";
} else {
    echo "Le pays n'est pas présent";
}
