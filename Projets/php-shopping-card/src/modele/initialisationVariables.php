<?php

include_once "fonctionsDiverses.php";

if(!isset($_SESSION['panier'])){
    $_SESSION['panier'] = [];
}

if (!isset($_SESSION['user'])){
    $_SESSION['user'] = [];
}

if (!isset($_SESSION['isCo'])){
    $_SESSION['isCo'] = False;
}

