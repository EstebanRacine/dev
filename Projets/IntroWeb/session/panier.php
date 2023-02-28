<?php

session_start();

function viderPanier():void{
    $_SESSION['panier'] = [];
}

$produits = $_SESSION['produits'];
print_r($_POST);
if($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['viderPanier'])) {
        viderPanier();
    } else {
        print_r($_POST);
        $_SESSION['panier'][$_POST['id']]['quantite'] -= 1;
        if ($_SESSION['panier'][$_POST['id']]['quantite'] == 0) {
            unset($_SESSION['panier'][$_POST['id']]);
        }
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
    <title>Mon panier</title>
</head>
<body>
<h1>Mon Panier</h1>
<?php
sort($_SESSION["panier"]);
$prixTotal = 0;
foreach ($_SESSION['panier'] as $produit){
    $id = $produit['id'];
    $nom = $produits[$id]['nom'];
    $prix = $produits[$id]['prix'];
    $prixQuantite = $prix*$produit['quantite'];
    $prixTotal += $prixQuantite;
    echo $nom.",   Quantité : ".$produit['quantite'].",   $prixQuantite €
  
  <form action='' method='post'>
  <input type='hidden' value='$id' name='id'>
  <input type='submit' value='Retirer un produit'>
</form>
  <br><br>";
}
echo "<p>Prix total : $prixTotal €</p>";

?>



<a href="index.php">Retour à la page des produits</a>
<br>
<form method="post">
    <input type="submit" name="viderPanier" value="Vider le panier">
</form>



</body>
</html>
