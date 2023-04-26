<?php

require "Phrase.php";
require "Texte.php";



//$phrase = new Phrase("Je suis en train d'apprendre le langage PHP.");
//echo $phrase->toString().PHP_EOL;
//echo $phrase->calculerNombresMots().PHP_EOL;
//echo $phrase->getMotPosition(9).PHP_EOL;
//echo $phrase->getType().PHP_EOL;
//echo $phrase->calculerNombreLettres().PHP_EOL;
//echo $phrase->getMotOccurence("le");

$texte = new Texte();
$texte->addTexteCompletInString("Bonjour, je suis un arbre et ,tel les chênes, je suis d'une force et d'une grandeur remarquable. Les vaches c'est cool aussi ! J'adore les renard et les oiseaux bleus !");

echo $texte->toString().PHP_EOL;
echo $texte->getNbPhrases().PHP_EOL;
echo $texte->getNombresMots().PHP_EOL;
echo $texte->calculerNombreLettres().PHP_EOL;
echo $texte->getNbDecla().PHP_EOL;
echo $texte->getNbInterro().PHP_EOL;
echo $texte->getNbExcla().PHP_EOL;
echo $texte->getOccurencesMot("les");
$texte->subPhraseString("Les vaches c'est cool aussi !");
echo $texte->toString().PHP_EOL;