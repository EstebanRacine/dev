<?php

require_once "./src/model/usecase/listerLesLivres/ListerLivre.php";

$liste = new ListerLivre();
$liste = $liste->execute();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Liste des livres</title>
</head>
<body>

<h1>LISTE DES LIVRES</h1>

<nav>
    <a href="index.php">Accueil</a>
    <a href="recherche.php">Recherche</a>
</nav>


<ul>
<?php
foreach ($liste as $livre){
?>

    <li><span class="italic"><?= $livre->getTitre() ?></span> par <span class="gras"><?= $livre->getAuteur()->getNomComplet() ?></span>
        <a href="details-livre.php?isbn=<?= $livre->getIsbn() ?>"> Voir plus </a></li>


<?php
}
?>
</ul>

</body>
</html>
