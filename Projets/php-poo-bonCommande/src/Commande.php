<?php

require_once "LigneCommande.php";
require_once "Client.php";

class Commande
{
    private int $idCommande;
    private DateTime $dateCommande;
    private string $modePaiement;
    private string $modalitésPaiement;
    private array $lignesCommandes;
    private Client $client;

    /**
     * @param int $idCommande
     * @param DateTime $dateCommande
     * @param string $modePaiement
     * @param string $modalitésPaiement
     * @param Client $client
     */
    public function __construct(
        int $idCommande,
        DateTime $dateCommande,
        string $modePaiement,
        string $modalitésPaiement,
        Client $client
    ) {
        $this->idCommande = $idCommande;
        $this->dateCommande = $dateCommande;
        $this->modePaiement = $modePaiement;
        $this->modalitésPaiement = $modalitésPaiement;
        $this->client = $client;
        $this->lignesCommandes = [];
    }

    /**
     * @return int
     */
    public function getIdCommande(): int
    {
        return $this->idCommande;
    }

    /**
     * @return DateTime
     */
    public function getDateCommande(): DateTime
    {
        return $this->dateCommande;
    }

    /**
     * @return string
     */
    public function getModePaiement(): string
    {
        return $this->modePaiement;
    }

    /**
     * @return string
     */
    public function getModalitésPaiement(): string
    {
        return $this->modalitésPaiement;
    }

    /**
     * @return array
     */
    public function getLignesCommandes(): array
    {
        return $this->lignesCommandes;
    }

    /**
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }

    public function addProduit(Produit $produit, float $quantite)
    {
        foreach ($this->lignesCommandes as $ligneCom) {
            if ($ligneCom->getProduit() == $produit) {
                $ligneCom->setQuantite($quantite + $ligneCom->getQuantite());
                return "Produit ajouté";
            }
        }
        $this->lignesCommandes[] = new LigneCommande($quantite, $produit);
        return "Produit ajouté";
    }

    public function getPrixTotalHT(): float
    {
        $total = 0;
        foreach ($this->lignesCommandes as $ligneCom) {
            $total += $ligneCom->getPrixHT();
        }
        return $total;
    }

    public function getPrixTotalTVA(): float
    {
        $total = 0;
        foreach ($this->lignesCommandes as $ligneCom) {
            $total += $ligneCom->getPrixTVA();
        }
        return $total;
    }

    public function getPrixTotalTTC(): float
    {
        return $this->getPrixTotalHT() + $this->getPrixTotalTVA();
    }

    public function editerBon()
    {
        $contenuBon =
            "Commande n°" .
            $this->getIdCommande() .
            " du " .
            date_format($this->getDateCommande(), "d/m/Y") .
            PHP_EOL;
        $contenuBon .=
            "Client : " .
            $this->getClient()->getNomClient() .
            PHP_EOL .
            "    " .
            $this->getClient()->getAdresseClient() .
            PHP_EOL .
            "    " .
            $this->getClient()->getCpClient() .
            " " .
            $this->getClient()->getVilleClient() .
            PHP_EOL .
            PHP_EOL;
        foreach ($this->lignesCommandes as $ligneCom) {
            $contenuBon .= $ligneCom->getProduit()->getRefProduit() . " - ";
            $contenuBon .=
                $ligneCom->getProduit()->getDescriptionProduit() . " - ";
            $contenuBon .= $ligneCom->getQuantite() . " - ";
            $contenuBon .= $ligneCom->getProduit()->getUniteProduit() . " - ";
            $contenuBon .= $ligneCom->getProduit()->getPrixHT() . " € - ";
            $contenuBon .= $ligneCom->getProduit()->getTauxTVA() . " % - ";
            $contenuBon .= $ligneCom->getPrixTVA() . " € - ";
            $contenuBon .= $ligneCom->getPrixTTC() . " € - " . PHP_EOL;
        }
        $contenuBon .=
            PHP_EOL . "        Total HT  : " . $this->getPrixTotalHT() . " €";
        $contenuBon .=
            PHP_EOL . "        Total TVA : " . $this->getPrixTotalTVA() . " €";
        $contenuBon .=
            PHP_EOL . "        Total TTC : " . $this->getPrixTotalTTC() . " €";
        return $contenuBon;
    }
}
