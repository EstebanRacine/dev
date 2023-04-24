<?php


class Evenement{

    private string $nom;
    private string $date;

    public function __construct(string $nom, string $date){
        $this->nom = $nom;
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    public function getNbJours() : string{
        $dateEve = DateTime::createFromFormat("d/m/Y", $this->date);
        $dateNow = new DateTime();
        $diff = $dateNow->diff($dateEve);
        return $diff->format('%a');
    }

    public function getCompteARebours():string{
        $dateEve = DateTime::createFromFormat("d/m/Y", $this->date);
        $dateNow = new DateTime();
        $diff = date_diff($dateNow, $dateEve);
        return $diff->format("%a jours, %H heures, %I minutes et %S secondes");
    }

}