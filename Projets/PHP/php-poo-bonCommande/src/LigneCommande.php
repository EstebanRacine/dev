<?php

require_once "Produit.php";

class LigneCommande
{
    private float $quantite;
    private Produit $produit;

    /**
     * @param float $quantite
     * @param Produit $produit
     */
    public function __construct(float $quantite, Produit $produit)
    {
        $this->quantite = $quantite;
        $this->produit = $produit;
    }

    /**
     * @return float
     */
    public function getQuantite(): float
    {
        return $this->quantite;
    }

    /**
     * @return Produit
     */
    public function getProduit(): Produit
    {
        return $this->produit;
    }

    /**
     * @param float $quantite
     */
    public function setQuantite(float $quantite): void
    {
        $this->quantite = $quantite;
    }

    public function getPrixHT(): float
    {
        return $this->quantite * $this->produit->getPrixHT();
    }

    public function getPrixTVA(): float
    {
        return $this->quantite *
            (($this->produit->getPrixHT() * $this->produit->getTauxTVA()) /
                100);
    }

    public function getPrixTTC(): float
    {
        return $this->getPrixHT() + $this->getPrixTVA();
    }
}
