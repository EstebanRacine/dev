<?php

require_once "./src/model/dao/EmpruntDAO.php";

class EmprunterLivre{
    private EmpruntDAO $empruntDAO;

    public function __construct()
    {
        $this->empruntDAO = new EmpruntDAO();
    }

    public function execute(Utilisateur $user, Livre $livre){
        return $this->empruntDAO->create($user, $livre);
    }

}