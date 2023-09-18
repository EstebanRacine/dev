<?php
require_once "./src/model/usecase/emprunterLivre/EmprunterLivre.php";

$user = new UtilisateursDAO();
$user = $user->findById(1);
$livre = new LivreDAO();
$livre = $livre->findAll();
$livre = $livre[0];

$emprunterLivre = new EmprunterLivre();
$emprunterLivre->execute($user, $livre);