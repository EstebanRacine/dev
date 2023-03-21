<?php

session_start();

$login = null;

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="pageConnexion.css">
    <link rel="stylesheet" href="style.css">
    <title>Connexion</title>
</head>
<body>

<div class="alignement">
    <div class="connexion">
        <h1>Connexion</h1>
        <form action="" method="post" autocomplete="off">
            <label for="login">Login</label>
            <input type="text" id="login" name="login" value="<?= $login ?>">
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password">
            <button id="buttonConnexion" type="submit">Se connecter</button>
        </form>
        <h3>Pas encore de compte ?</h3>
        <a href="createUser.php">Créez en un !</a>
    </div>
</div>



</body>
</html>
