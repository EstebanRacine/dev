<?php

namespace usecase\rechercherParNomAuteur;
use LivreDAO;

require_once "./src/model/dao/LivreDAO.php";

class RechercherParNomAuteur
{
    private LivreDAO $livreDAO;

    public function __construct()
    {
        $this->livreDAO = new LivreDAO();
    }


    public function execute(string $nomAuteur): array
    {
        return $this->livreDAO->searchNomAuteur($nomAuteur);
    }
}