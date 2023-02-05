<?php
include "src/utils/requetes.php";
include "src/utils/date.php";
include "src/utils/fonctions.php";
$arrayStudents = getAllStudents();
$student = getStudentByID(1);
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
        <a href="contact.php">Contact</a>
</nav>

<main></main>

<footer>
    Hello World
</footer>

</div>
</body>
</html>
