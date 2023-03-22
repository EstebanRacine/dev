<?php

include_once "src/modele/requetesProduits.php";

session_start();

include_once "src/modele/initialisationVariables.php";

if ($_SERVER['REQUEST_METHOD']=="POST"){
    if (isset($_POST['deco'])){
        $_SESSION['user'] = [];
        $_SESSION['isCo'] = false;
    }else {
        if (in_array($_POST["produit"], array_keys($_SESSION['panier']))) {
            $_SESSION['panier'][$_POST["produit"]]["quantite"] += 1;
        } else {
            $_SESSION['panier'][$_POST["produit"]]["quantite"] = 1;
            $_SESSION['panier'][$_POST["produit"]]["prix"] = $_POST["prix"];
        }
    }
}

$page = 0;

if (isset($_GET['page'])){
    $page = $_GET['page'];
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

$nbProd = getNbProduits()['nbProd'];
$produits = getProduitsParPage($page);

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
        <div class="icone">
            <a href="pageConnexion.php"><i class="fa-solid fa-user"></i></a>
        </div>
        <?php
        if ($_SESSION['isCo']){
        ?>
        <div class="deco">
            <form action="" method="post" id="formDeconnecter">
                <button type="submit" value="1" name="deco"><i class="fa-solid fa-xmark"></i> Se déconnecter</button>
            </form>
        </div>
        <?php
        }
        ?>
        <div class="icone">
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
                $produit["prixProduit"]=number_format($produit["prixProduit"], 2);
            ?>
                <div class="card">
                    <img src="<?= $produit['imgProduit'] ?>" alt="Image du produit">
                    <h2 class="nom"><?php
                        echo $produit['nomProduit'];
                        if (in_array($produit["nomProduit"], array_keys($_SESSION["panier"]))){
                            echo " <i class='fa-solid fa-certificate'></i>";
                        }
                        ?></h2>
                    <h3><?= "Prix : ".$produit['prixProduit']." €" ?></h3>
                    <p class="description"><?= $produit['descrProduit']?></p>
                    <form action="" method="post">
                        <input hidden type="text" value="<?= $produit["idProduit"]?>" name="produit">
                        <input hidden type="text" value="<?= $produit['prixProduit']?>" name="prix">
                        <button type="submit"><i class="fa-sharp fa-solid fa-cart-shopping"></i></button>
                    </form>
                </div>



            <?php
            }
            ?>
    </div>
    <div class="page">
        <?php
        if ($page <> 0){
            echo "<a class='precedent' href='index.php?page=" . ($page - 1) ."'>Précédent</a>";
        }
        for ($i=1; $i<=ceil($nbProd/6); $i++){
            if ($i == $page+1){
                echo "<a class='pageNumber present' href='index.php?page=" . ($i - 1) ."'>$i</a>";
            }else{
                echo "<a class='pageNumber' href='index.php?page=" . ($i - 1) ."'>$i</a>";
            }

        }
        if ($page <> ceil($nbProd/6)-1){
            echo "<a class='suivant' href='index.php?page=" . ($page + 1) ."'>Suivant</a>";
        }
        ?>
    </div>
</div>

</body>
</html>
