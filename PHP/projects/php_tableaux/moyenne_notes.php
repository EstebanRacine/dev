<?php
$notes = [10, 12.5, 14, 7, 15, 9.5, 8];
$somme = 0;
if(count($notes)==0){
    echo "Le tableau n'est pas valide";
} else {
foreach($notes as $note){
    $somme += $note;
};
$moy = round($somme/count($notes), 2);
echo $moy;
echo PHP_EOL;
if($moy < 10){
    echo "Vous n'avez pas votre diplome.";
} elseif($moy<12){
    echo "Mention passable";
} elseif($moy<14){
    echo "Mention assez bien.";
} elseif($moy<16){
    echo "Mention bien";
} else {
    echo "Mention très bien.";
};
}