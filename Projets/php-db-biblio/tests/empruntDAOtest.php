<?php
require_once "./src/model/dao/EmpruntDAO.php";
$empruntDAO = new EmpruntDAO();
$emprunts = $empruntDAO->findByUserId(1);
var_dump($emprunts);