<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <title>Les chaines</title>
</head>
<body>
<h1>Les chaines de caractères</h1>
<div class="RetourSommaire">
    <a href="index.php"><i class="fa-solid fa-house"></i>Retour à l'accueil</a>
</div>

<div class="execution">
    <p>Bienvenue dans le cours PHP Web !</p>
    <p>
        <?php
        echo "Bienvenue dans le cours PHP-Web !";
        ?>
    </p>
    <?php
    echo "<p>Bienvenue dans le cours PHP-WEB !</p>";
    ?>
    <?=
    "Bienvenue dans le Cours php-web"
    ?>
</div>


</body>
</html>