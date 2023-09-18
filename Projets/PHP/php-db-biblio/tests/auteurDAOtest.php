<?php

require_once "./src/model/dao/AuteurDAO.php";


$rowling = new Auteur();
$rowling->setNomAuteur("Rowling");
$rowling->setPrenomAuteur("J.K.");

$autDAO = new AuteurDAO();
$auteurs = $autDAO->findAll();
//$auteurTest = $autDAO->findById(1);
$autDAO->delete(5);
//$autDAO->create($rowling);

//var_dump($autDAO->findAll());

$king = new Auteur();
$king->setPrenomAuteur('Stefen');
$king->setNomAuteur('King');
//$autDAO->create($king);


$king = $autDAO->findById(7);
$king->setPrenomAuteur("Stephen");
$autDAO->update($king);

var_dump($autDAO->findAll());