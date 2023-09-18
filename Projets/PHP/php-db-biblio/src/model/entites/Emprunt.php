<?php

require_once "Livre.php";
require_once "Utilisateur.php";

class Emprunt{
    private int $idEmprunt;
    private DateTime $dateEmprunt;
    private Livre $livre;
    private Utilisateur $user;

    public function __construct(){
    }

    /**
     * @return DateTime
     */
    public function getDateEmprunt(): DateTime
    {
        return $this->dateEmprunt;
    }

    /**
     * @param DateTime $dateEmprunt
     */
    public function setDateEmprunt(DateTime $dateEmprunt): void
    {
        $this->dateEmprunt = $dateEmprunt;
    }

    /**
     * @return int
     */
    public function getIdEmprunt(): int
    {
        return $this->idEmprunt;
    }

    /**
     * @param int $idEmprunt
     */
    public function setIdEmprunt(int $idEmprunt): void
    {
        $this->idEmprunt = $idEmprunt;
    }

    /**
     * @return Livre
     */
    public function getLivre(): Livre
    {
        return $this->livre;
    }

    /**
     * @param Livre $livre
     */
    public function setLivre(Livre $livre): void
    {
        $this->livre = $livre;
    }

    /**
     * @return Utilisateur
     */
    public function getUser(): Utilisateur
    {
        return $this->user;
    }

    /**
     * @param Utilisateur $user
     */
    public function setUser(Utilisateur $user): void
    {
        $this->user = $user;
    }





}