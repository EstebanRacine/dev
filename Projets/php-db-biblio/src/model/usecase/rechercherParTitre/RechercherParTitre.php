<?php

namespace usecase\rechercherTitre;
use LivreDAO;

require_once "./src/model/dao/LivreDAO.php";

class RechercherTitre{
    private LivreDAO $livreDAO;

    public function __construct()
    {
        $this->livreDAO = new LivreDAO();
    }


    public function execute(string $titre): array
    {
        return $this->livreDAO->searchTitre($titre);
    }
}