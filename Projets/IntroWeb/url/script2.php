<?php
    //Test présence para dans request HTTP
    $nom = null;
    $erreur = null;
    if(!empty($_GET['nom'])){
        $nom = $_GET['nom'];
    }else{
        $erreur = "L'URL demandée est non valide";
    }
    ?>


<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Script 2</title>
</head>
<body>
    <?php
    if(isset($erreur)){ ?>
        <div class="Erreur">
            <h2>ERREUR</h2>
            <p> <?= $erreur ?> </p>
        </div>
   <?php }else{ ?>

<h1>Script 2</h1>
<p>Ceci est le script 2</p>
<p>Bonjour je m'appelle <?php echo ucfirst($nom); ?></p>
<?php } ?>
</body>
</html>