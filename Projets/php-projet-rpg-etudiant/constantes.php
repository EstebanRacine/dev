<?php

// Les codes couleur
const BLUE = "\033[34m" ;
const YELLOW = "\033[33m" ;
const GREEN = "\033[32m" ;
const RED = "\033[31m" ;
const RESET = "\033[0m" ;
const POSITION_VIDE = '-';
const OBSTACLE = 'O';
const HERO = 'H';
const ARRIVEE = 'A';
define('LARGEUR', readline('Quel est la largeur ?'));
define('HAUTEUR', readline('Quel est la hauteur ?'));
define('NOMHERO', readline('Quel est le nom du hero ?'));