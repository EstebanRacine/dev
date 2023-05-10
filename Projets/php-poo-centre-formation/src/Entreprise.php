<?php

class Entreprise {
    private string $nomEntreprise;
    private string $rueEntreprise;
    private int $cpEntreprise;
    private string $villeEntreprise;

    /**
     * @param string $nomEntreprise
     * @param string $rueEntreprise
     * @param int $cpEntreprise
     * @param string $villeEntreprise
     */
    public function __construct(
        string $nomEntreprise,
        string $rueEntreprise,
        int $cpEntreprise,
        string $villeEntreprise,
    ) {
        $this->nomEntreprise = $nomEntreprise;
        $this->rueEntreprise = $rueEntreprise;
        $this->cpEntreprise = $cpEntreprise;
        $this->villeEntreprise = $villeEntreprise;
    }
}
