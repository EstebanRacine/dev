<?php


class Auteur{
    private int $id;
    private string $nomAuteur;
    private string $prenomAuteur;

//    CONSTRUCTEUR SANS PARAMETRES
    public function __construct(){
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNomAuteur(): string
    {
        return $this->nomAuteur;
    }

    /**
     * @param string $nomAuteur
     */
    public function setNomAuteur(string $nomAuteur): void
    {
        $this->nomAuteur = $nomAuteur;
    }

    /**
     * @return string
     */
    public function getPrenomAuteur(): string
    {
        return $this->prenomAuteur;
    }

    /**
     * @param string $prenomAuteur
     */
    public function setPrenomAuteur(string $prenomAuteur): void
    {
        $this->prenomAuteur = $prenomAuteur;
    }



}