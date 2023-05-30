<?php
require_once "./src/model/dao/UtilisateursDAO.php";
$userDAO = new UtilisateursDAO();
$users = $userDAO->findById(1);
var_dump($users);