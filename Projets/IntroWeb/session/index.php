<?php

session_start();

$produits = [
    "p1" => ['nom' => "Produit 1", 'prix' => 5.55],
    "p2" => ['nom' => "Produit 2", 'prix' => 3.99],
    "p3" => ['nom' => "Produit 3", 'prix' => 24],
    "p4" => ['nom' => "Produit 4", 'prix' => 59.99],
    "p5" => ['nom' => "Produit 5", 'prix' => 12]
];

$_SESSION['produits'] = $produits;

if(!isset($_SESSION['panier'])){
    $_SESSION['panier'] = [];
}

if ($_SERVER['REQUEST_METHOD']=="POST"){
    print_r($_POST);
    $cle = $_POST['cle'];
    if(isset($_SESSION['panier'][$cle])){
        $_SESSION['panier'][$cle]['quantite'] += 1;
    }else{
        $_SESSION['panier'][$cle]['id'] = $cle;
        $_SESSION['panier'][$cle]['quantite'] = 1;
        print_r($_SESSION['panier']);
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Liste des articles</title>
</head>
<body>

<h1>Liste des produits</h1>

<?php
foreach ($produits as $cle => $produit){
    echo "<br>".$produit['nom'].",     ".$produit['prix']." €    
<form method='post'>

    <input type='hidden' value='$cle' name='cle'>
    <input type='submit' value='Ajouter au panier'>

</form>";
}


?>
<br>
<a href="panier.php"> Mon Panier </a>
<?php
$count = count($_SESSION['panier']);


echo "<p><i class='fa-solid fa-bag-shopping'></i> $count</p>";
?>
</body>
</html>

