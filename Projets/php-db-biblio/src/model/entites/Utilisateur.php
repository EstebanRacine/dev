<?php

require_once "Emprunt.php";

class Utilisateur{
    private int $idUser;
    private string $nomUser;
    private string $prenomUser;

    public function __construct(){
    }

    /**
     * @return int
     */
    public function getIdUser(): int
    {
        return $this->idUser;
    }

    /**
     * @param int $idUser
     */
    public function setIdUser(int $idUser): void
    {
        $this->idUser = $idUser;
    }

    /**
     * @return string
     */
    public function getNomUser(): string
    {
        return $this->nomUser;
    }

    /**
     * @param string $nomUser
     */
    public function setNomUser(string $nomUser): void
    {
        $this->nomUser = $nomUser;
    }

    /**
     * @return string
     */
    public function getPrenomUser(): string
    {
        return $this->prenomUser;
    }

    /**
     * @param string $prenomUser
     */
    public function setPrenomUser(string $prenomUser): void
    {
        $this->prenomUser = $prenomUser;
    }


}