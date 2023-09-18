<?php

require_once "./src/model/usecase/rechercherParISBN/RechercherByISBN.php";

if (!isset($_GET['isbn'])){
    header("Location: erreur.php");
}

$livre = new \usecase\rechercherParISBN\RechercherByISBN();
$livre = $livre->execute($_GET['isbn']);
if (gettype($livre)=="boolean"){
    header("Location: erreur.php");
}

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Détails du livre</title>
</head>
<body>

<h1>DÉTAILS DE  <?= $livre->getTitre() ?></h1>

<nav>
    <a href="index.php">Accueil</a>
    <a href="recherche.php">Recherche</a>
</nav>


<ul>
    <li>Titre : <?= $livre->getTitre() ?></li>
    <li>ISBN : <?= $livre->getIsbn() ?></li>
    <li>Date de parution : <?= date_format($livre->getDateParution(), "d/m/Y") ?></li>
    <li>Nombre de pages : <?= $livre->getNbPages() ?></li>
    <li>Auteur : <?= $livre->getAuteur()->getNomComplet() ?></li>
</ul>


</body>
</html>
