<?php
$text = strtolower(" ".readline("Quel est votre texte ?")." ");
$mot = strtolower(" ".readline("Quel est le mot à chercher ?")." ");
$nbOccu = substr_count($text, $mot);
echo 'Le mot "'.$mot.'" apparait '.$nbOccu.' fois';