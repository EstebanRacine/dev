<?php
$date = date('d/m/Y');
$jour = date('w');
echo "Nous sommes le $date";
echo PHP_EOL;
if($jour == 0){
    echo "Bon dimanche";
} elseif($jour == 6){
    echo "Bon week-end";
} else {
    echo "Bonne journée";
};