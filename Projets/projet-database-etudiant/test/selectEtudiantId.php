<?php

//Rechercher etudiant par ID
//SQL : SELECT * from etudiant WHERE id_etudiant = ?
include_once('../src/modele/etudiantDB.php');

$id = readline("Quel est l'ID de l'étudiant recherché ?");
echo PHP_EOL;

//$etudiant = getStudentByID($id);
$etudiant = getAllStudents();

displayStudent($etudiant);