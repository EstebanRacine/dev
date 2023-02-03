<?php
require "../src/modele/etudiantDB.php";

addStudent("Louis", "Palodaura", "good.listening@ouie.uk", "2005-06-09", "23 rue de la Musique", "0689651478");
$etudiant = getAllStudents();
displayStudent($etudiant);