<?php

session_start();

include_once "src/modele/requetes/requetesUsers.php";
include_once "src/modele/initialisationVariables.php";

$login = null;
$nom = null;
$prenom = null;
$mail = null;
$role = 0;
$erreurs = [];



if ($_SERVER['REQUEST_METHOD']=="POST"){

    if (!empty(trim($_POST['login']))){
        $logins = getAllLogins();
        $login = $_POST['login'];
        if (in_array($_POST['login'], $logins)){
            $erreurs['login']="Le login est déjà utilisé";
        }
    }else{
        $erreurs['login']="Veuillez remplir le login";
    }

    if (!empty(trim($_POST['password']))){
        $testMdp = testMdp($_POST['password']);
        if (!gettype($testMdp)=="boolean"){
            $erreurs['password'] = $testMdp;
        }
    }else{
        $erreurs['password']="Veuillez remplir le champs Mot de passe";
    }

    if (!empty(trim($_POST['passwordBis']))){
        if ($_POST['password'] <> $_POST['passwordBis']){
            $erreurs['passwordBis'] = "Les mots de passe ne correspondent pas";
        }
    }else{
        $erreurs['passwordBis'] = "Veuillez réécrire le mot de passe";
    }

    if (!empty(trim($_POST['nom']))){
        $nom = $_POST['nom'];
    }else{
        $erreurs['nom'] = "Veuillez remplir le champ Nom";
    }

    if (!empty(trim($_POST['prenom']))){
        $prenom = $_POST['prenom'];
    }else{
        $erreurs['prenom'] = "Veuillez remplir le champ Prenom";
    }

    if (!empty(trim($_POST['mail']))){
        $mail = $_POST['mail'];
    }else{
        $erreurs['mail'] = "Veuillez remplir le champ Mail";
    }

    if (empty($erreurs)){
        $id = addUser($nom, $prenom, $login, $_POST['password'], $mail);
        $_SESSION['isCo'] = True;
        $user = getUserByLogin($_POST['login']);
        $_SESSION['user']['nom'] = $nom;
        $_SESSION['user']['prenom'] = $prenom;
        $_SESSION['user']['id'] = $id;
        $_SESSION['user']['mail'] = $mail;
        $_SESSION['user']['role'] = $role;
        header('Location: index.php');
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
    <link rel="stylesheet" href="css/createUser.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
          integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,800&display=swap" rel="stylesheet">
    <title>Créer un compte</title>
</head>
<body>
<div class="alignement">
    <div class="retour">
        <a href="index.php"><i class="fa-solid fa-circle-arrow-left"></i> Retour à la page d'accueil</a>
    </div>
    <div class="createUser">
        <h1>Créer un compte</h1>
        <form action="" method="post">
            <label for="login">Login <span class="rouge">*</span></label>
            <input type="text" value="<?= $login ?>" id="login" name="login">
            <?php
            if (isset($erreurs['login'])){
                echo "<p class='rouge'>".$erreurs['login']."</p>";
            }
            ?>

            <label for="password">Mot de passe <span class="rouge">*</span></label>
            <input type="password" value="" id="password" name="password">
            <?php
            if (isset($erreurs['password'])){
                echo "<p class='rouge'>".$erreurs['password']."</p>";
            }
            ?>

            <label for="passwordBis">Confirmer le mot de passe <span class="rouge">*</span></label>
            <input type="password" value="" id="passwordBis" name="passwordBis">
            <?php
            if (isset($erreurs['passwordBis'])){
                echo "<p class='rouge'>".$erreurs['passwordBis']."</p>";
            }
            ?>

            <label for="nom">Nom <span class="rouge">*</span></label>
            <input type="text" value="<?= $nom ?>" id="nom" name="nom">
            <?php
            if (isset($erreurs['nom'])){
                echo "<p class='rouge'>".$erreurs['nom']."</p>";
            }
            ?>

            <label for="nom">Prenom <span class="rouge">*</span></label>
            <input type="text" value="<?= $prenom ?>" id="prenom" name="prenom">
            <?php
            if (isset($erreurs['prenom'])){
                echo "<p class='rouge'>".$erreurs['prenom']."</p>";
            }
            ?>

            <label for="mail">Adresse mail <span class="rouge">*</span></label>
            <input type="text" value="<?= $mail ?>" id="mail" name="mail">
            <?php
            if (isset($erreurs['mail'])){
                echo "<p class='rouge'>".$erreurs['mail']."</p>";
            }
            ?>

            <button type="submit">Créer le compte</button>
        </form>
    </div>
</div>
</body>
</html>
