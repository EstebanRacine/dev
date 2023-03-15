<?php

session_start();

if(!isset($_SESSION['panier'])){
    $_SESSION['panier'] = [];
}
if ($_SERVER['REQUEST_METHOD']=="POST"){
    if (in_array($_POST["produit"], array_keys($_SESSION['panier']))){
        $_SESSION['panier'][$_POST["produit"]]["quantite"] += 1;
    }else{
        $_SESSION['panier'][$_POST["produit"]]["quantite"] = 1;
        $_SESSION['panier'][$_POST["produit"]]["prix"] = $_POST["prix"];
    }
}

$produits = [
        ["nom"=>"Produit 1", "img"=> "https://picsum.photos/id/10/300/200", "prix"=>19.99, "description"=>"Description Produit 1"],
        ["nom"=>"Produit 2", "img"=> "https://picsum.photos/id/20/300/200", "prix"=>5.49, "description"=>"Description Produit 2"],
        ["nom"=>"Produit 3", "img"=> "https://picsum.photos/id/30/300/200", "prix"=>25.46, "description"=>"Description Produit 3"],
        ["nom"=>"Produit 4", "img"=> "https://picsum.photos/id/40/300/200", "prix"=>2.34, "description"=>"Description Produit 4"],
        ["nom"=>"Produit 5", "img"=> "https://picsum.photos/id/50/300/200", "prix"=>59.99, "description"=>"Description Produit 5"],
        ["nom"=>"Produit 6", "img"=> "https://picsum.photos/id/60/300/200", "prix"=>12.25, "description"=>"Description Produit 6"],
        ["nom"=>"Produit 7", "img"=> "https://picsum.photos/id/70/300/200", "prix"=>99.99, "description"=>"Description Produit 7"],
        ["nom"=>"Produit 8", "img"=> "https://picsum.photos/id/80/300/200", "prix"=>9.99, "description"=>"Description Produit 8"],
        ["nom"=>"Produit 9", "img"=> "https://picsum.photos/id/90/300/200", "prix"=>4.3, "description"=>"Description Produit 9"]
];


?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
          integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,800&display=swap" rel="stylesheet">
    <title>Liste produits</title>
</head>
<body>
<div class="container">
    <div class="panier">
        <div class="iconePanier">
            <a href="panier.php"><i class="fa-sharp fa-solid fa-cart-shopping"></i></a>
        </div>
        <div class="infosPanier">
            <p><?= count($_SESSION['panier'])." produit(s)"?></p>
            <p class="prix"><?php
                $prix = 0;
                foreach ($_SESSION['panier'] as $produit){
                    $prix += $produit["quantite"]*$produit['prix'];
                }
                $prix = number_format($prix, 2);
                echo $prix." €";
                ?></p>
        </div>
    </div>

    <h1>Liste des produits</h1>
    <div class="produits">
            <?php
            foreach ($produits as $produit){
                $produit["prix"]=number_format($produit["prix"], 2);
            ?>
                <div class="card">
                    <img src="<?= $produit['img'] ?>" alt="Image du produit">
                    <h2><?php
                        echo $produit['nom'];
                        if (in_array($produit["nom"], array_keys($_SESSION["panier"]))){
                            echo " <i class='fa-solid fa-certificate'></i>";
                        }
                        ?></h2>
                    <h3><?= "Prix : ".$produit['prix']." €" ?></h3>
                    <p><?= $produit['description'] ?></p>
                    <form action="" method="post">
                        <input hidden type="text" value="<?= $produit["nom"]?>" name="produit">
                        <input hidden type="text" value="<?= $produit['prix']?>" name="prix">
                        <button type="submit"><i class="fa-sharp fa-solid fa-cart-shopping"></i></button>
                    </form>
                </div>



            <?php
            }
            ?>
    </div>
</div>

</body>
</html>
