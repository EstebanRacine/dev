<?php
$tableau = [
    ["Nom" => "Durand", "Moyenne" => 15.3],
    ["Nom" => "Martin", "Moyenne" => 12.1],
    ["Nom" => "Kass", "Moyenne" => 18.6],
    ["Nom" => "Trotin", "Moyenne" => 3.7]
];

for($eleve = 0; $eleve<count($tableau); $eleve++){
    echo $tableau[$eleve]["Nom"]." ".$tableau[$eleve]["Moyenne"];
    echo PHP_EOL;
}

echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;

$majorde = $tableau[0];
foreach($tableau as $eleve){
    if($eleve["Moyenne"]>=10) {
        echo $eleve["Nom"] . " " . $eleve["Moyenne"];
        echo PHP_EOL;
    }
    if($eleve["Moyenne"]>$majorde["Moyenne"]){
        $majorde = $eleve;
    }
}
echo "Le major de promo est ".$majorde["Nom"].".";
