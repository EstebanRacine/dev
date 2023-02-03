<?php
    //Si formulaire soumis : POST
    //Sinon : GET
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        //Recuperer les données saisies par user
        $rue = $_POST["rue"];
        $codePostal = $_POST["code_postal"];
        $ville = $_POST["ville"];

    //On insere dans DB


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
    <title>Formulaires</title>
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <label for="rue">Rue</label>
            <input type="text" id="rue" name="rue">

            <label for="code_postal">Code Postal</label>
            <input type="text" id="code_postal" name="code_postal">

            <label for="ville">Ville</label>
            <input type="text" id="ville" name="ville">

            <input type="submit" value="Envoyer">
        </form>
    </div>
</body>
</html>