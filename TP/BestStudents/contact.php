<?php

include_once "src/utils/date.php";
include_once "src/utils/requetes.php";

$horaires = getAllHoraires();
$nom = NULL;
$mail = NULL;
$message = NULL;
$objet = NULL;
$alert = "Votre message a bien été envoyé.";

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $erreur = [];

    if (empty(trim($_POST['nom']))){
        $erreur['nom'] = "Veuillez entrer un nom.";
    }else{
        $nom = $_POST['nom'];
    }
    if (empty(trim($_POST['mail']))){
        $erreur['mail'] = "Veuillez entrer votre adresse mail.";
    }else{
        if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){
            $nom = $_POST['nom'];
        }else{
            $erreur['mail'] = "L'adresse mail n'est pas valide.";
        }
    }

    if (empty(trim($_POST['message']))){
        $erreur['message'] = "Veuillez entrer votre message.";
    }else{
        $message = $_POST['message'];
    }

    if (empty(trim($_POST['objet']))){
        $objet = "Message via formulaire de contact";
    }else{
        $objet = $_POST['objet'];
    }

    if ($erreur == []){
        if(mail("esteban.racineecole@gmail.com", $objet, $message, "From : ".$mail)) {
            $nom = NULL;
            $mail = NULL;
            $message = NULL;
            $objet = NULL;
            echo '<script type="text/javascript">window.alert("' . $alert . '");</script>';
        }else{
            $erreur['envoi'] = "Erreur lors de l'envoi du message, veuilez réessayer.";
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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Accueil</title>
</head>
<body>
<div class="container">
    <?php
    include "src/headerEtNav.php";
    ?>

    <main class="Contact">
        <div class="infos">
            <h3>Contact</h3>
            <div class="orgaInfos">
                <div class="infosContact">
                    <a href="tel:+16174951000"><i class="fa-solid fa-phone"></i> +16174951000</a>
                    <a href="mailto:college@fas.harvard.edu"><i class="fa-solid fa-envelope"></i> college@fas.harvard.edu</a>
                    <p>Harvard University<br>
                        Massachusetts Hall<br>
                        Cambridge, MA 02138</p>
                    <a href="https://www.harvard.edu/" target="_blank"><i class="fa-solid fa-globe"></i> https://www.harvard.edu/</a>

                </div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d23586.23105316146!2d-71.13290777383946!3d42.357895530482615!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e377427d7f0199%3A0x5937c65cee2427f0!2sUniversit%C3%A9%20Harvard!5e0!3m2!1sfr!2sfr!4v1677681400721!5m2!1sfr!2sfr" width="400" height="320" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

            </div>
        </div>



        <div class="horaires">
            <h1>Horaires du secrétariat</h1>
            <?php
            if (ActuellementHoraires()){
                echo "<h3 class='Vert'>Actuellement ouvert</h3>";
            }else{
                echo "<h3 class='Rouge'>Actuellement femé</h3>";
            }
                foreach ($horaires as $jour){
                    echo "<p>".$jour['lib_jour']." : ";
                    if (!isset($jour['ouvertureMatin']) and !isset($jour['ouvertureApMidi'])){
                        echo "<span class='Rouge'>Fermé</span></p>";
                    }else{
                        if(isset($jour['ouvertureMatin'])){
                            echo "de ".$jour['ouvertureMatin']." à ".$jour['fermetureMatin'];
                            if (isset($jour['ouvertureApMidi'])){
                                echo " et ";
                            }
                        }
                        if (isset($jour['ouvertureApMidi'])){
                            echo "de ".$jour['ouvertureApMidi']." à ".$jour['fermetureApMidi'];
                        }
                        echo "</p>";
                    }
                }
            ?>
        </div>



        <div class="formContact">

            <h3>Envoyez nous un message !</h3>

            <form method="post">

                <label for="">Nom <span class="Rouge">*</span></label>
                <input name="nom" id="nom" type="text" value="<?=$nom?>">

                <?php
                if (isset($erreur['nom'])){
                    echo "<p class='Rouge'>".$erreur['nom']."</p>";
                }
                ?>


                <label for="mail">Adresse Mail <span class="Rouge">*</span></label>
                <input type="text" name="mail" id="mail" value="<?=$mail?>">

                <?php
                if (isset($erreur['mail'])){
                    echo "<p class='Rouge'>".$erreur['mail']."</p>";
                }
                ?>

                <label for="objet">Objet</label>
                <input name="objet" id="objet" type="text" value="<?=$objet?>">

                <label for="message">Votre message <span class="Rouge">*</span></label>
                <input type="text" name="message" id="message" value="<?=$message?>">

                <?php
                if (isset($erreur['message'])){
                    echo "<p class='Rouge'>".$erreur['message']."</p>";
                }
                ?>

                <input type="submit" value="Envoyer un mail" id="sendMail">
                <?php
                if (isset($erreur['envoi'])){
                    echo "<p class='Rouge'>".$erreur['envoi']."</p>";
                }
                ?>
            </form>
        </div>

    </main>

    <?php
    include "src/footer.php";
    ?>

</div>
</body>
</html>