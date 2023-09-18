<?php

namespace usecase\rechercherParISBN;
use Livre;
use LivreDAO;

require_once "./src/model/dao/LivreDAO.php";


class RechercherByISBN
{
    private LivreDAO $livreDAO;

    public function __construct()
    {
        $this->livreDAO = new LivreDAO();
    }

    public function execute($isbn): Livre|bool
    {
        return $this->livreDAO->searchISBN($isbn);
    }
}