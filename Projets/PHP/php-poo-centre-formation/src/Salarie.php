<?php

require_once 'Entreprise.php';

class Salarie {
    private string $prenomSalarie;
    private string $nomSalarie;
    private Entreprise $entreprise;

    /**
     * @param string $prenomSalarie
     * @param string $nomSalarie
     * @param Entreprise $entreprise
     */
    public function __construct(string $prenomSalarie, string $nomSalarie, Entreprise $entreprise) {
        $this->prenomSalarie = $prenomSalarie;
        $this->nomSalarie = $nomSalarie;
        $this->entreprise = $entreprise;
    }
}
