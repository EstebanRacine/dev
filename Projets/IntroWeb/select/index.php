<?php

$categories = [
        ['id'=>1, 'nom'=>'Sport'],
    ['id'=>2, 'nom'=>'Musique'],
    ['id'=>3, 'nom'=>'Science'],
    ['id'=>4, 'nom'=>'Economie'],
    ['id'=>5, 'nom'=>'Histoire'],
    ['id'=>6, 'nom'=>'Politique']
];






    if($_SERVER['REQUEST_METHOD'] === "POST"){
        if(!empty($_POST['cat'])){
            echo $_POST['cat'];
        }else{
            echo "Il n'y a aucune catégorie";
        }

        if(isset($_POST['cat3'])){
            $cat3 = $_POST['cat3'];
            print_r($cat3);
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
    <title>Liste déroulante</title>
</head>
<body>

<div class="container">
    <div class="form-container">
        <img src="images/avatar.png" alt="Avatar d'une personne">
        <div class="formulaire">
            <h1>Catégories</h1>
            <form method="post">
                <!-- Liste déroulante -->
                <label for="cat">Catégories</label>
                <select name="cat" id="cat">
                    <option value="">Aucune</option>
                    <option value="1">Sport</option>
                    <option value="2">Musique</option>
                    <option value="3">Science</option>
                    <option value="4">Economie</option>
                    <option value="5">Histoire</option>
                    <option value="6">Politique</option>
                </select>
                <label for="cat2">Catégorie Bis</label>
                <select name="cat2" id="cat2">
                    <option value="">Aucune</option>

                    <?php
                    foreach ($categories as $categorie){
                        echo " <option value='".$categorie['id']."'>".$categorie['nom']."</option>";
                    }
                    ?>

                </select>

                <label for="cat3">Catégorie Ter</label>
                <select name="cat3[]" id="cat3" multiple size="<?= count($categories)+1 ?>">
                    <option value="">Aucune</option>

                    <?php
                    foreach ($categories as $categorie){
                        echo " <option value='".$categorie['id']."'>".$categorie['nom']."</option>";
                    }
                    ?>

                </select>



                <input type="submit" value="Envoyer">
            </form>
        </div>
    </div>
</div>

</body>
</html>
