<?php
$nbPhotocopies = intval(readline("Combien de photocopies voulez vous ?"));
$prix = 0;
if($nbPhotocopies > 30){
    $prix += ($nbPhotocopies-30)*0.2;
    $nbPhotocopies = 30;
};
if($nbPhotocopies > 10){
    $prix += ($nbPhotocopies-10)*0.25;
    $nbPhotocopies = 10;
};
$prix += $nbPhotocopies*0.3;
if($prix > 50){
    $prix *= 0.9;
}
echo "Le prix sera de $prix €";