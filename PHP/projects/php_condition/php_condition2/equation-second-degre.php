<?php
$a = readline("Entrez le coefficient a");
$b = readline("Entrez le coefficient b");
$c = readline("Entrez le coefficient c");
echo "On résout $a x² + $b x + $c = 0";
echo PHP_EOL;
$determinant = $b**2 - 4*$a*$c;
echo $determinant;
if($determinant<0){
    echo "Il n'y a pas de solution";
} elseif($determinant == 0){
    $x1 = -$b/2*$a;
    echo "la solution est $x1";
} else {
    $x1 = (-$b-sqrt($determinant))/(2*$a);
    $x2 = (-$b+sqrt($determinant))/(2*$a);
    echo "Il y a 2 solutions distinctes ";
    echo PHP_EOL;
    echo "x1 = $x1";
    echo PHP_EOL;
    echo "x2 = $x2";
}
