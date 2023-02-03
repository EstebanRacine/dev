<?php
include_once 'src/modele/etudiantDB.php';
$etudiant = getStudentByID($_GET['id'])[0];
$nom = $etudiant['nom_etudiant'];
$prenom = $etudiant['prenom_etudiant'];
$mail = $etudiant['email_etudiant'];
$birth = strtotime($etudiant['date_naissance_etudiant']);
$birth = date('d F Y', $birth);
$adresse = $etudiant['adresse_etudiant'];
$tel = $etudiant['tel_etudiant'];
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Détails</title>
</head>
<body>
<div class="container">
    <header>
        <h1>Best Students</h1>
    </header>
    <main id="detail">
    <div class="details">
        <div class="image">
            <img src="src/images/student.png" alt="Image de l'étudiant">
        </div>
        <div class="ecrit">
            <div class="name">
                <?php echo $prenom." ".$nom?>
            </div>
            <div class="naissance">
                <?php echo $birth?>
            </div>
            <div class="adresse">
                <?php echo $adresse?>
            </div>
            <div class="contact">
                <p><?php echo $tel?></p>
                <p><?php echo $mail?></p>
            </div>
        </div>
    </main>
    </div>



    <footer>

    </footer>
</div>

</body>
</html>
