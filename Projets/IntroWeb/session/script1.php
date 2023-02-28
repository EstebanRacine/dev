<?php
//ON CREE LA SESSION /!\ PREMIERE INSTRUCTION
    session_start();
//    ON STOCKE UNE VALEUR DANS LA SESSION
    $_SESSION['utilisateur']['prenom'] = "Esteban";
    $_SESSION['utilisateur']['nom'] = "Racine";
    $_SESSION['utilisateur']['est_majeur'] = True;

    $_SESSION['panier']['p1'] = "Produit 1";
    $_SESSION['panier']['p2'] = "Produit 2";

//    POUR SUPPRIMER INFOS DE L'UTILISATEUR
    unset($_SESSION['utilisateur']);

//    POUR SUPPRIMER LE PANIER
    unset($_SESSION['panier']);

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Créer une session</title>
</head>
<body>
<h1>Session</h1>
<p>Ce script permet de créer une nouvelle session</p>
</body>
</html>
