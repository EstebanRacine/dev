<?php


use usecase\listerLesLivres\ListerLivre;

require_once "./src/model/usecase/listerLesLivres/ListerLivre.php";

$listeLivres = new ListerLivre();
print_r($listeLivres->execute());