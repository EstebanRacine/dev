<?php
$chaine = readline("Quels sont les paramètres ?");
if(strlen($chaine) < 1 or strlen($chaine) > 100){
    echo "La chaine n'est pas valide";
} else{
    $ind = 0;
    $lettre = $chaine[$ind];
    $distanceXC = 0;
    $distanceCB = 0;
    while($lettre != "C"){
        if($lettre == "B"){
            echo "NO";
            exit;
        }
        $ind += 1;
        $distanceXC += 1;
        $lettre = $chaine[$ind];

    }
    while($lettre[$ind] != "B"){
        $distanceCB += 1;
        $ind += 1;
        $lettre = $chaine[$ind];
    }
    if($distanceXC < $disatnceCB){
        echo "YES";
    } else{
        echo "NO";
    }


}
