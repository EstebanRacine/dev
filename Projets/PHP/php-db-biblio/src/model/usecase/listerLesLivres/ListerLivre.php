<?php

require_once "./src/model/dao/LivreDAO.php";


class ListerLivre
{

    private LivreDAO $livreDAO;


    public function __construct()
    {
        $this->livreDAO = new LivreDAO();
    }
//    PERMET D'EXÉCUTER LA FONCTIONNALITÉ

    /**
     * @return Livre[]
     */
    public function execute(): array
    {
        return $this->livreDAO->findAll();
    }
}