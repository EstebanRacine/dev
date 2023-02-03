<?php
$produit = [
  "P0001" => ["Désignation" => "Produit 1", "Prix" => 50.99, "Stock" => 10],
    "P0002" => ["Désignation" => "Produit 2", "Prix" => 99.99, "Stock" => 20],
    "P0003" => ["Désignation" => "Produit 3", "Prix" => 25.50, "Stock" => 6],
    "P0004" => ["Désignation" => "Produit 4", "Prix" => 130.99, "Stock" => 4]
];
$valStock = 0;
$aReapprovisioner = [];
foreach($produit as $cle => $element){
    echo $cle." : ".$element["Désignation"];
    echo PHP_EOL;
    $valStock += $element["Stock"]*$element["Prix"];
    if($element["Stock"]<7){
        $aReapprovisioner[] = $cle;
    }
}
echo "La valeur du stock est de $valStock";
echo PHP_EOL;
print_r($aReapprovisioner);

echo PHP_EOL;
echo PHP_EOL;

$codeReaap = readline("Saisir le code ");
if(!array_key_exists($codeReaap, $produit)){
    echo "La référence n'existe pas !";
}else {
    $quantiteRecue = readline("Quelle est la quantité reçue ? ");
    $produit[$codeReaap]["Stock"] += $quantiteRecue;
    echo "La quantité a bien été mise à jour. ";
}


