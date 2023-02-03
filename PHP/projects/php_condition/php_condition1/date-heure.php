<?php
$date = date('d/m/Y');
$heure = date('H:i');
echo "Aujourd'hui nous sommes le $date";
echo PHP_EOL;
echo "Il est actuellement $heure";
echo PHP_EOL;
if(date('H')<=23 and date('H') > 13){
    $souhait = "bon après-midi";
} else {
    $souhait = "bonne matinée";
};
echo "Je vous souhaite une $souhait";