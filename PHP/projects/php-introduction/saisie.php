<?php
//Saisie par utilisateur
$prenom = readline('Quel est votre prénom ?');
$prenom = strtolower($prenom);
$prenom = ucfirst($prenom);
$deuxLettres = substr($prenom, 0, 2);
echo "Je m'appelle $deuxLettres .";
echo PHP_EOL;
echo strlen($prenom);