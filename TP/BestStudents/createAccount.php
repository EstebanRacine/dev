<?php
include "src/utils/requetes.php";


$prenom = NULL;
$nom = NULL;
$login=NULL;
$mdp = NULL;







if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST['prenom']))){
        $erreurs['prenom'] = "Veuillez remplir le champs Prénom";
    } else{
        $prenom = $_POST['prenom'];
    }

    if(empty(trim($_POST['nom']))){
        $erreurs['nom'] = "Veuillez remplir le champs Nom";
    } else{
        $nom = $_POST['nom'];
    }

    if (empty(trim($_POST['login']))){
        $erreurs['login'] = "Veuillez remplir le champs Login";
    } else{
        if (!loginValid($_POST['login'])){
            $erreurs['login'] = "Le login est déjà utilisé";
        }
        $login = $_POST['login'];
    }

    if (empty(trim($_POST['mdp']))){
        $erreurs['mdp'] = "Veuillez remplir le champs Mot de passe";
    }else{
        $mdp = $_POST['mdp'];
    }


    if(empty($erreurs)){
        addUser($nom, $prenom, $login, $mdp, 0);
        $_SESSION['user']['isCo'] = true;
        $_SESSION['user']['login'] = $login;
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
    <link rel="stylesheet" href="style.css">
    <title>Creation de compte</title>
</head>
<body>
<div class="container">
    <?php
    include "src/headerEtNav.php";
    ?>

    <main class="creation">
        <form action="" method="post"">

            <label for="prenom">Prénom <span class="Rouge">*</span></label>
            <input type="text" name="prenom" id="prenom" value="<?= $prenom ?>">
            <?php
            if (isset($erreurs['prenom'])){
                $erreur = $erreurs['prenom'];
                echo "<p class='Rouge'> $erreur </p>";
            }else{
                echo "<p> </p>";
            }
            ?>

            <label for="nom">Nom <span class="Rouge">*</span></label>
            <input type="text" name="nom" id="nom" value="<?= $nom ?>">
            <?php
            if (isset($erreurs['nom'])){
                $erreur = $erreurs['nom'];
                echo "<p class='Rouge'> $erreur </p>";
            }else{
                echo "<p> </p>";
            }
            ?>

            <label for="login">Login <span class="Rouge">*</span></label>
            <input type="text" name="login" id="login" value="<?= $login ?>">
            <?php
            if (isset($erreurs['login'])){
                $erreur = $erreurs['login'];
                echo "<p class='Rouge'> $erreur </p>";
            }else{
                echo "<p> </p>";
            }
            ?>

            <label for="mdp">Mot de passe <span class="Rouge">*</span></label>
            <input type="password" name="mdp" id="mdp" value="<?= $mdp ?>">
            <?php
            if (isset($erreurs['mdp'])){
                $erreur = $erreurs['mdp'];
                echo "<p class='Rouge'> $erreur </p>";
            }else{
                echo "<p> </p>";
            }
            ?>

            <input type="submit" value="Envoyer" class="submit">

        </form>

        <div id="stars">
            <p>(<span class="Rouge">*</span> : Les astérisques signifient que le champ est obligatoire)</p>
        </div>


    </main>

    <?php
    include "src/footer.php";
    ?>

</div>
</body>
</html>