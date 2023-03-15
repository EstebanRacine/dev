<?php

CONST HOST = "localhost:3306";
CONST BDD = "shoppingcard";
CONST LOGIN = "root";
CONST PASSWORD = "";

function createConnection():PDO{
    $dsn = "mysql:host=".HOST.";dbname=".BDD.";charset=utf8;";
    try {
        $connexion = new PDO($dsn, LOGIN, PASSWORD);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connexion;
    } catch (PDOException $erreur){
        die("Erreur : ".$erreur->getMessage());
    }
}