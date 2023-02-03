<?php
$prenom = readline("Quel est votre prenom ?");
$nom = readline("Quel est ton nom ?");
$INITIALES = strtoupper($prenom[0].$nom[0]);
echo "Vos initiales sont $INITIALES";