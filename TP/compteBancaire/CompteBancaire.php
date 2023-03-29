<?php

class CompteBancaire{

    private string $numCompte;
    private float $solde;
    private string $titulaire;
    private int $decouvert;
    private bool $gold;


    /**
     * @throws Exception
     */
    public function __construct(float $solde, string $titulaire, int $decouvert, string $dateInscr)
    {
        $numCompte = "FR-";
        $nbAleatoire = strval(random_int(0, 99999999));
        $nbAleatoire = str_pad($nbAleatoire, 8, "0", STR_PAD_LEFT);
        $numCompte .= $nbAleatoire;
        $this->numCompte = $numCompte;
        $this->solde = $solde;
        $this->titulaire = $titulaire;
        $this->decouvert = $decouvert;

        $now = time();
        $date = date('Y-m-d', $now);

        $origine = date_create($dateInscr);
        $actuel = date_create($date);
        $diff = date_diff($origine, $actuel);
        $anneDepuisInscription = $diff->format('%Y');
        if ($anneDepuisInscription>=10){
            $this->gold = True;
        }else{
            $this->gold = False;
        }

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

    public function consulterSolde(){
        return "Bonjour ".$this->titulaire.", votre solde est de ".number_format($this->solde, 2)." €.".PHP_EOL;
    }

    public function isGold(){
        if ($this->gold){
            return "Le compte est gold.".PHP_EOL;
        }else{
            return "Le compte n'est pas gold".PHP_EOL;
        }
    }

}