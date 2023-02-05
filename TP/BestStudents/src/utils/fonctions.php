<?php

function displayStudent(array $etudiants):void{
    if (!$etudiants){
        echo "Cet étudiant n'existe pas";
    }else{
        foreach($etudiants as $eleve){
            echo $eleve['id']." ".$eleve['prenom']." ".$eleve['nom']." ".$eleve['date_naissance']." ".$eleve['email']." ".$eleve['tel']." ".$eleve['adresse']." ".$eleve['ville'].PHP_EOL;
        }
    }
}

