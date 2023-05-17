<?php

require_once "./src/model/dao/AuteurDAO.php";


$rowling = new Auteur();
$rowling->setNomAuteur("Rowling");
$rowling->setId(5);
$rowling->setPrenomAuteur("J.K.");

$autDAO = new AuteurDAO();
$auteurs = $autDAO->findAll();
//$auteurTest = $autDAO->findById(1);
$autDAO->delete(5);
$autDAO->create($rowling);

var_dump($autDAO->findAll());

$king = new Auteur();
$king->setId(5);
$king->setPrenomAuteur('Stephen');
$king->setNomAuteur('King');
$autDAO->update($king);

var_dump($autDAO->findAll());