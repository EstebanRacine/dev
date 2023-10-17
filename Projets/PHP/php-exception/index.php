<?php

use App\Exceptions\NombreException;
use App\Validateurs\Validateur;

require "vendor/autoload.php";

$valideur = new Validateur();
try {
    $valideur->verifierNombre(-10);
    echo "Le nombre est positif.";
}catch (NombreException $e){
    echo $e->getMessage();
}