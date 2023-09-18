<?php
require_once "./src/model/usecase/rechercherParNomAuteur/RechercherParNomAuteur.php";
require_once "./src/model/usecase/listerLesLivres/ListerLivre.php";
require_once "./src/model/usecase/rechercherParTitre/RechercherParTitre.php";
require_once "./src/model/usecase/rechercherLikeISBN/RechercherLikeISBN.php";
$auteur = null;

if ($_SERVER['REQUEST_METHOD']=="POST"){
    $search = $_POST['search'];
    if ($_POST['categorie']=="auteur") {
        $liste = new \usecase\rechercherParNomAuteur\RechercherParNomAuteur();
        $liste = $liste->execute($search);
    }elseif ($_POST['categorie']=="titre"){
        $liste = new \usecase\rechercherTitre\RechercherTitre();
        $liste = $liste->execute($search);
    }elseif ($_POST['categorie']=="isbn"){
        $liste = new \usecase\rechercherLikeISBN\RechercherLikeISBN();
        $liste = $liste->execute($search);
    }
}else{
    $liste = new ListerLivre();
    $liste = $liste->execute();
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
    <title>Recherche</title>
</head>
<body>

<h1>RECHERCHE</h1>

<nav>
    <a href="index.php">Accueil</a>
    <a href="recherche.php">Recherche</a>
</nav>

<form action="" method="post" autocomplete="off">
    <label for="categorie">Type de recherche : </label>
    <select name="categorie" id="categorie">
        <option value="isbn">ISBN</option>
        <option value="titre">Titre</option>
        <option value="auteur">Nom de l'auteur</option>
    </select>
    <br>
    <label for="search">Recherche : </label>

    <input type="text" name="search" id="search" value="<?= $auteur ?>">
    <button type="submit">Rechercher</button>
</form>

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
