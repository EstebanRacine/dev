<?php

class Produit
{
    private string $refProduit;
    private string $descriptionProduit;
    private float $prixHT;
    private float $tauxTVA;
    private string $unite;

    /**
     * @param string $refProduit
     * @param string $descriptionProduit
     * @param float $prixHT
     * @param float $tauxTVA
     * @param string $unite
     */
    public function __construct(
        string $refProduit,
        string $descriptionProduit,
        float $prixHT,
        float $tauxTVA,
        string $unite
    ) {
        $this->refProduit = $refProduit;
        $this->descriptionProduit = $descriptionProduit;
        $this->prixHT = $prixHT;
        $this->tauxTVA = $tauxTVA;
        $this->unite = $unite;
    }

    /**
     * @return string
     */
    public function getRefProduit(): string
    {
        return $this->refProduit;
    }

    /**
     * @return string
     */
    public function getDescriptionProduit(): string
    {
        return $this->descriptionProduit;
    }

    /**
     * @return float
     */
    public function getPrixHT(): float
    {
        return $this->prixHT;
    }

    /**
     * @return float
     */
    public function getTauxTVA(): float
    {
        return $this->tauxTVA;
    }

    /**
     * @return string
     */
    public function getUniteProduit(): string
    {
        return $this->unite;
    }
}
