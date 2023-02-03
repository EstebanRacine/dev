<?php
$sexe = readline("Quel est votre sexe ? (M ou F)");
$age = intval(readline("Quel est votre âge ?"));
$estFemmeEntre20Et30Ans = $sexe == "F" && $age >= 20 && $age < 30;
$estHommePlusDe22Ans = $sexe == "M" && $age > 22;
if ($estHommePlusDe22Ans || $estFemmeEntre20Et30Ans) {
    echo "Vous devez payer la surprime";
} else {
    echo "Vous n'avez pas à payer la surprime";
}