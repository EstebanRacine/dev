<?php
    include_once "./donnees/films.php";
    include_once "fonctions.php";
    $id = null;
    $erreur = null;
    $codeErreur = False;
    if(!empty($_GET)){
        $id = $_GET['id'];
    }else{
        $erreur = "URL non valide";
    }
    if(isset($erreur)){
        $codeErreur = True;
    }else{
    $film = rechercherFilmParID($filmsTable, $id);
    if(!isset($film)){
        $codeErreur = True;
    }else{
    $real = $film['realisateur'];
    $titre = $film['titre'];
    $duree = convertirDuree2($film['duree']);
    $annee = $film['annee'];
    $affiche = "/images/".$film['affiche'];
    $synop = $film['synopsis'];
    $acteurs = $film['acteurs'];
    $url = $film['ba'];}}
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
    <title>Détails de votre film</title>
</head>
<body>

<?php
if($codeErreur){
    echo "<div id='Erreur'>";
    echo "<i class=\"fa-solid fa-circle-exclamation\"></i>";
    echo "<h1>DÉSOLÉ</h1>";
    echo "<p>URL non valide</p>";
    echo "</div>";
}else{?>


<div id="ConteneurGeneral">
    <div id="Film">
    <h1><?= $titre ?></h1>
    <?php echo "<img src=$affiche>"?>
    <div id="real"><?= "<t>Par </t>".$real?></div>

    <?php
    echo "<p id='Avec'>Avec</p>";
    foreach($acteurs as $acteur){
        echo "<p class='acteurs'> $acteur </p>";
    }
    ?>

    <?php echo "<div class=\"Time\">
        <div class=\"Date\"><i class=\"fa-solid fa-calendar-days\"></i> $annee </div>
        <div class=\"Temps\"><i class=\"fa-solid fa-clock\"></i> $duree </div>
    </div>" ?>
    <p id="Synopsis"><?= $synop ?></p>
    <?= "<a href=$url target='_blank'>Lien vers la bande-annonce VF</a>" ?>
</div>
</div>
<?php } ?>
</body>
</html>
