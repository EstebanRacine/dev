<?php

class Entreprise {
    private string $nomEntreprise;
    private string $rueEntreprise;
    private string $cpEntreprise;
    private string $villeEntreprise;

    /**
     * @param string $nomEntreprise
     * @param string $rueEntreprise
     * @param string $cpEntreprise
     * @param string $villeEntreprise
     */
    public function __construct(
        string $nomEntreprise,
        string $rueEntreprise,
        string $cpEntreprise,
        string $villeEntreprise,
    ) {
        $this->nomEntreprise = $nomEntreprise;
        $this->rueEntreprise = $rueEntreprise;
        $this->cpEntreprise = $cpEntreprise;
        $this->villeEntreprise = $villeEntreprise;
    }
}
