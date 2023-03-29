<?php

class CompteBancaire{

    private string $numCompte;
    private float $solde;
    private string $titulaire;
    private int $decouvert;
    private string $dateInscription;


    /**
     * @throws Exception
     */
    public function __construct(string $titulaire, int $decouvert, string $dateInscr)
    {
        $numCompte = "FR-";
        $nbAleatoire = strval(random_int(0, 99999999));
        $nbAleatoire = str_pad($nbAleatoire, 8, "0", STR_PAD_LEFT);
        $numCompte .= $nbAleatoire;
        $this->numCompte = $numCompte;
        $this->solde = 0;
        $this->titulaire = $titulaire;
        $this->decouvert = $decouvert;
        $this->dateInscription = $dateInscr;



    }

    public function getNumCompte(): string
    {
        return $this->numCompte;
    }

    public function addSolde(float $depot){
        $this->solde += $depot;
    }

    public function retireSolde(float $somme){
        $max = $this->solde+$this->decouvert;
        if ($somme<= $max){
            $this->solde -= $somme;
        }else{
            echo "Vous ne pouvez pas retirer cette somme.".PHP_EOL;
        }
    }

    public function consulterCompte(){
        return "N° de compte : ".$this->numCompte.PHP_EOL."Titulaire : ".$this->titulaire.PHP_EOL."Solde : ".number_format($this->solde, 2)." €.".PHP_EOL;
    }

    public function isGold(){
        $now = time();
        $date = date('Y-m-d', $now);
        $origine = date_create($this->dateInscription);
        $actuel = date_create($date);
        $diff = date_diff($origine, $actuel);
        $anneDepuisInscription = $diff->format('%Y');
        if ($anneDepuisInscription>=10){
            return "Le compte est Gold";
        }else{
            return "le compte n'est pas Gold";
        }
    }

}