<?php
require_once "./src/model/dao/LivreDAO.php";
require_once "./src/model/dao/AuteurDAO.php";

$livDAO = new LivreDAO();
$bibliotheque = $livDAO->findAll();
var_dump($bibliotheque);

//Récupération d'un auteur
$autDAO = new AuteurDAO();
$king = $autDAO->findById(5);

//Création d'un livre
$ca = new Livre();
$ca->setTitre('Ça');
$ca->setNbPages(799);
$ca->setAuteur($king);
$ca->setIsbn("9782253151340");
$ca->setDateParution(date_create_from_format("d/m/Y", "06/02/2002"));

//SUPPRESSION DU LIVRE SI IL EXISTE
$livDAO->delete("9782253151340");

//AJOUT DU LIVRE
$livDAO->create($ca);