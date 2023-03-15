<?php

session_start();

if (!isset($_SESSION['panier'])){
    $_SESSION['panier'] = [];
}

if ($_SERVER['REQUEST_METHOD']=="POST"){
    if (isset($_POST["viderPanier"])){
        $_SESSION['panier'] =[];
    }elseif(isset($_POST['modifProd'])){
        $nom = $_POST['nom'];
        $_SESSION["panier"][$nom]['quantite'] = $_POST['quantite'];
    }elseif (isset($_POST['suppProd'])){
        unset($_SESSION['panier'][$_POST['nom']]);
    }
}

$prixTotal = 0;


?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="panier.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,800&display=swap" rel="stylesheet">
    <title>Mon panier</title>
</head>
<body>
<div class="container">
    <h1>Votre panier</h1>

    <table>
        <thead>
        <tr>
            <th>Nom</th>
            <th>Prix Unitaire</th>
            <th>Quantité</th>
            <th>Total</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if (!empty($_SESSION['panier'])){
        foreach ($_SESSION['panier'] as $nom=>$produit){
        ?>
        <tr>
            <td><?= $nom ?></td>
            <td><?= $produit['prix']." €" ?></td>
            <td>
                <form method="post">
                    <input type="text" hidden name="nom" value="<?= $nom?>">
                    <input type="number" value="<?= $produit['quantite']?>" min="1" step="1" name="quantite">
                    <button type="submit" class="modifProd" name="modifProd">Modifier</button>
                </form>
            </td>
            <td><?= $produit['quantite']*$produit['prix']." €" ?></td>
            <?php
            $prixTotal += $produit['quantite']*$produit['prix'];
            ?>
            <td>
                <form method="post">
                    <input type="text" hidden name="nom" value="<?= $nom?>">
                    <button type="submit" class="action" name="suppProd" value="1">Supprimer</button>
                </form>
            </td>
        </tr>
        <?php
        }
        ?>
        <tfoot>
        <tr>
            <td colspan="3">
                TOTAL
            </td>
            <td id="prixTotal"><?= number_format($prixTotal, 2)." €" ?></td>
            <td>
                <form action="" method="post">
                    <button type="submit" name="viderPanier" class="action">Vider le panier</button>
                </form>
            </td>
        </tr>
        </tfoot>
        <?php
        }else{
        echo "
        <tr>
        <td class='panierVide' colspan='5'>Vous n'avez aucun produit dans votre panier</td>
</tr>
        ";
        }
        ?>
        </tbody>
    </table>

<!--    AJOUTER BOUTON-->



    </div>
</body>
</html>
