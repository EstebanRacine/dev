<?php
include_once "./donnees/films.php";
include_once "fonctions.php";

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
          integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="style.css">
    <title>Liste des films</title>
</head>
<body>
<div id="ConteneurGeneral">
<h1>Accueil</h1>
<div id="ListeFilms">
<?php
$filmsTable = rechercherFilms($filmsTable);
foreach($filmsTable as $film){
    $id = $film['id'];
    $real = $film['realisateur'];
    $titre = $film['titre'];
    $duree = convertirDuree2($film['duree']);
    $annee = $film['annee'];
    $affiche = "/images/".$film['affiche'];
    echo "
    <div class=\"card\">
        <img class=\"card-img\" src = $affiche alt=\"\">
        <div class=\"infos\">
        <div class=\"Title\"> $titre</div>
        <div class=\"Time\">
            <div class=\"Date\"><i class=\"fa-solid fa-calendar-days\"></i> $annee </div>
            <div class=\"Temps\"><i class=\"fa-solid fa-clock\"></i> $duree </div>
        </div>
        <div class=\"Real\"> <t>Par</t> $real</div>
        <a href=\"details-film.php?id=$id\"> Plus de détails </a>
        </div>
    </div>
    ";


}


?>
</div>
</div>






</body>
</html>