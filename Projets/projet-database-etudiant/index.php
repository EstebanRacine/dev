<?php
require_once 'src/modele/etudiantDB.php';
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Home</title>
</head>
<body>
<div class="container">
    <header>
        <h1>Best Students</h1>
    </header>
    <main>
        <?php
        $etudiants = getAllStudents();
        foreach ($etudiants as $etudiant){
            $id = $etudiant['id_etudiant'];
            $nom = $etudiant['nom_etudiant'];
            $prenom = $etudiant['prenom_etudiant'];
            $birth = strtotime($etudiant['date_naissance_etudiant']);
            $birth = date('d F Y', $birth);



            echo "<div class=\"card\">
            <img src=\"src/images/student.png\" alt=\"Dessin d'étudiant\">
            <div class=\"prenom\"><p>$prenom</p></div>
            <div class=\"nom\"><p>$nom</p></div>
            <div class=\"birth\"><p>$birth</p></div>
            <div class=\"infos\"><a href=\"detail-etudiant.php?id=$id\">Plus d'infos</a></div>
        </div>";
        }

        ?>
    </main>
    <footer></footer>
</div>
</body>
</html>
