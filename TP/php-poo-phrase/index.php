<?php

require "Phrase.php";


$phrase = new Phrase("Je suis en train d'apprendre le langage PHP.");
echo $phrase->toString().PHP_EOL;
echo $phrase->calculerNombresMots().PHP_EOL;
echo $phrase->getMotPosition(9).PHP_EOL;
echo $phrase->getType().PHP_EOL;
echo $phrase->calculerNombreLettres().PHP_EOL;
echo $phrase->getMotOccurence("le");