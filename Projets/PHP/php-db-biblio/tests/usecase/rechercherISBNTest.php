<?php


use usecase\rechercherParISBN\RechercherByISBN;

require_once "./src/model/usecase/rechercherParISBN/RechercherByISBN.php";

$recherche = new RechercherByISBN();
print_r($recherche->execute("978-2701196749"));