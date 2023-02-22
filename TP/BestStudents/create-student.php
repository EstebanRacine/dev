<?php
include "src/utils/requetes.php";


$prenom = NULL;
$nom = NULL;
$date_naissance=NULL;
$email = NULL;
$tel = NULL;
$adresse = NULL;
$ville = NULL;
$image = NULL;
$erreurs = [];

$listePromo = getAllPromo();

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST['prenom']))){
        $erreurs['prenom'] = "Veuillez remplir le champs Prénom";
    } else{
        $prenom = $_POST['prenom'];
    }

    if(empty(trim($_POST['nom']))){
        $erreurs['nom'] = "Veuillez remplir lez champs Nom";
    } else{
        $nom = $_POST['nom'];
    }

    if (empty(trim($_POST['date_naissance']))){
        $erreurs['date_naissance'] = "Veuillez remplir le champs Date de naissance";
    } else{
        $date_naissance = $_POST['date_naissance'];
    }

    if (empty(trim($_POST['email']))){
        $erreurs['email'] = "Veuillez remplir le champs Email";
    }else{
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $erreurs['email'] = "L'email n'est pas valide";
        }
        $email = $_POST['email'];
    }


    if(empty(trim($_POST['tel']))){
        $erreurs['tel'] = "Veuillez remplir le champs Telephone";
    }else{
        $tel = $_POST['tel'];
    }

    if (isset($_POST['adresse'])){
        $adresse = $_POST['adresse'];
    }

    if (empty(trim($_POST['ville']))){
        $erreurs['ville'] = "Veuillez remplir le champs Ville";
    }else{
        $ville = $_POST['ville'];
    }
    if (empty($erreurs)) {
        if (empty($_FILES["image"]['name'])) {
            $image = "src/images/students/student.jpg";
        } else {
            $nomFichier = $_FILES["image"]['name'];
            $typeFichier = $_FILES["image"]['type'];
            $tmpFichier = $_FILES["image"]['tmp_name'];
            $tailleFichier = $_FILES["image"]['size'];
            if (!str_contains($typeFichier, "image")) {
                $erreurs['image'] = "Le fichier n'est pas une image";
            } else {
                if ($tailleFichier > 600000) {
                    $erreurs['image'] = "L'image est trop lourde";
                } else {
                    $extensionFichier = pathinfo($nomFichier, 4);
                    print_r($extensionFichier);
                    if ($extensionFichier != "png" and $extensionFichier != "jpg" and $extensionFichier != "jepg" and $extensionFichier != "JPEG" and $extensionFichier != "JPG" and $extensionFichier != "PNG") {
                        $erreurs['image'] = "Le fichier n'a pas la bonne extension (png, jpg ou jpeg)";
                    } else {
                        $nomFichier = uniqid() . "." . $extensionFichier;
                        $image = "src/images/students/$nomFichier";
                        if (!move_uploaded_file($tmpFichier, "src/images/students/$nomFichier")){
                            $erreurs['image'] = "Erreur lors de l'upload";
                        }else{
                            move_uploaded_file($tmpFichier, "src/images/students/$nomFichier");
                        }
                    }
                }
            }
        }
    }

    if(empty($erreurs)){
        $promoEtudiant = $_POST['promo'];
        addStudent($prenom, $nom, $date_naissance, $email, $tel, $adresse, $ville, $image, $promoEtudiant);
        header('Location: index.php');
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
    <title>Accueil</title>
</head>
<body>
<div class="container">
    <header>
        <img src="src/images/BS_Logo.png" alt="Logo de Best Students">
        <h1>Best Students</h1>
    </header>

    <nav>
        <a href="index.php">Accueil</a>
        <a href="create-student.php">Ajouter un étudiant</a>
        <a href="listePromo.php">Liste des promotions</a>
        <a href="contact.php">Contact</a>

    </nav>

    <main class="creation">
        <form action="" method="post" enctype="multipart/form-data">

            <label for="prenom">Prénom <span class="Rouge">*</span></label>
            <input type="text" name="prenom" id="prenom" value="<?= $prenom ?>">
            <?php
            if (isset($erreurs['prenom'])){
                $erreur = $erreurs['prenom'];
                echo "<p class='Rouge'> $erreur </p>";
            }else{
                echo "<p> </p>";
            }
            ?>

            <label for="nom">Nom <span class="Rouge">*</span></label>
            <input type="text" name="nom" id="nom" value="<?= $nom ?>">
            <?php
            if (isset($erreurs['nom'])){
                $erreur = $erreurs['nom'];
                echo "<p class='Rouge'> $erreur </p>";
            }else{
                echo "<p> </p>";
            }
            ?>

            <label for="date_naissance">Date de naissance <span class="Rouge">*</span></label>
            <input type="date" name="date_naissance" id="date_naissance" value="<?= $date_naissance ?>">
            <?php
            if (isset($erreurs['date_naissance'])){
                $erreur = $erreurs['date_naissance'];
                echo "<p class='Rouge'> $erreur </p>";
            }else{
                echo "<p> </p>";
            }
            ?>

            <label for="email">Email <span class="Rouge">*</span></label>
            <input type="text" name="email" id="email" value="<?= $email ?>">
            <?php
            if (isset($erreurs['email'])){
                $erreur = $erreurs['email'];
                echo "<p class='Rouge'> $erreur </p>";
            }else{
                echo "<p> </p>";
            }
            ?>

            <label for="tel">Telephone <span class="Rouge">*</span></label>
            <input type="text" name="tel" id="tel" value="<?= $tel ?>"">

            <?php
            if (isset($erreurs['tel'])){
                $erreur = $erreurs['tel'];
                echo "<p class='Rouge'> $erreur </p>";
            }else{
                echo "<p> </p>";
            }
            ?>

            <label for="adresse">Adresse</label>
            <input type="text" name="adresse" id="adresse" value="<?= $adresse ?>"">
            <br>


            <label for="ville">Ville <span class="Rouge">*</span></label>
            <input type="text" name="ville" id="ville" value="<?= $ville ?>">
            <?php
            if (isset($erreurs['ville'])){
                $erreur = $erreurs['ville'];
                echo "<p class='Rouge'> $erreur </p>";
            }else{
                echo "<p> </p>";
            }
            ?>

            <label for="promo">Promotion</label>
            <select name="promo" id="promo">
                <option value="">Aucune promotion</option>
                <?php
                foreach($listePromo as $promo){
                    echo "<option value=".$promo['id_promo'].">".$promo['nom_promo']."</option>";
                }
                ?>

            </select>



            <label for="image">Image <span class="Rouge">**</span></label>
            <input type="file" name="image" id="image" class="inputImage">
            <?php
            if (isset($erreurs['image'])){
                $erreur = $erreurs['image'];
                echo "<p class='Rouge'> $erreur </p>";
            }else{
                echo "<p> </p>";
            }
            ?>

            <input type="submit" value="Envoyer" class="submit">

        </form>

        <div id="stars">
            <p>(<span class="Rouge">*</span> : Les astérisques signifient que le champ est obligatoire)</p>
            <p>(<span class="Rouge">**</span> : Si aucune image n'a été donnée une image de base sera attribuée )</p>
        </div>


    </main>

    <footer>
        <div class="reseaux">
            <div class="facebook">
                <a href="https://fr-fr.facebook.com/" target="_blank" class="FondReseau"><svg style="color: white" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16"> <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" fill="white"></path> </svg></a>
            </div>
            <div class="insta">
                <a href="https://www.instagram.com/" target="_blank" class="FondReseau"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                        <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                    </svg></a>
            </div>
        </div>
    </footer>

</div>
</body>
</html>