<?php

namespace usecase\rechercherLikeISBN;
use LivreDAO;

require_once "./src/model/dao/LivreDAO.php";

class RechercherLikeISBN{
    private LivreDAO $livreDAO;

    public function __construct()
    {
        $this->livreDAO = new LivreDAO();
    }


    public function execute(string $isbn): array
    {
        return $this->livreDAO->searchLikeISBN($isbn);
    }
}