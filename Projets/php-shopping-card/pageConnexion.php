<?php

include_once "src/modele/requetes/requetesUsers.php";

session_start();

$login = null;

include_once "src/modele/initialisationVariables.php";

if ($_SESSION['isCo']){
    header('Location: pageUser.php');
}


if ($_SERVER['REQUEST_METHOD']=="POST"){
    if(verifConnexion($_POST['login'], $_POST['password'])){
        $_SESSION['isCo'] = True;
        $user = getUserByLogin($_POST['login']);
        $_SESSION['user']['nom'] = $user['nomUser'];
        $_SESSION['user']['prenom'] = $user['prenomUser'];
        $_SESSION['user']['id'] = $user['idUser'];
        $_SESSION['user']['mail'] = $user['mailUser'];
        $_SESSION['user']['role'] = $user['roleUser'];
        header('Location: index.php');
    }else{
        $erreur = "<p class='rouge'>Erreur lors de l'authentification</p>";
        $login = $_POST['login'];
    }
}



?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/pageConnexion.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
          integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,800&display=swap" rel="stylesheet">
    <title>Connexion</title>
</head>
<body>

<div class="alignement">
    
    <div class="retour">
        <a href="index.php"><i class="fa-solid fa-circle-arrow-left"></i> Retour à l'accueil</a>
    </div>

    <div class="connexion">
        <h1>Connexion</h1>
        <form action="" method="post" autocomplete="off">
            <label for="login">Login</label>
            <input type="text" id="login" name="login" value="<?= $login ?>">
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password">
            <?php
            if (isset($erreur)){
                echo $erreur;
            }
            ?>
            <button id="buttonConnexion" type="submit">Se connecter</button>
        </form>
        <h3>Pas encore de compte ?</h3>
        <a href="createUser.php">Créez en un !</a>
    </div>
</div>



</body>
</html>
