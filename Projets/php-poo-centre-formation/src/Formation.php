<?php

require_once 'Inscription.php';

class Formation {
    private string $libelle;
    private int $nbPlaces;
    private DateTime $dateDebut;
    private DateTime $dateFin;
    private array $inscriptions;

    /**
     * @param string $libelle
     * @param int $nbPlaces
     * @param DateTime $dateDebut
     * @param DateTime $dateFin
     * @param array $inscriptions
     */
    public function __construct(
        string $libelle,
        int $nbPlaces,
        DateTime $dateDebut,
        DateTime $dateFin,
    ) {
        $this->libelle = $libelle;
        $this->nbPlaces = $nbPlaces;
        $this->dateDebut = $dateDebut;
        $this->dateFin = $dateFin;
        $this->inscriptions = [];
    }

    public function inscrireSalarie(Salarie $salarie): string {
        if (count($this->inscriptions) < $this->nbPlaces) {
            $sala = new Inscription($salarie);
            if (in_array($sala, $this->inscriptions)){
                return "Inscription impossible, le salarié est déjà inscrit";
            }
            $this->inscriptions[] = new Inscription($salarie);
            return "L'inscription a bien été crée";
        }
        return 'Inscription impossible, la formation est déjà pleine.';
    }

    public function noterSalarie(Salarie $salarie, float $note, string $appreciation) {
        foreach ($this->inscriptions as $ins) {
            if ($ins->getSalarie() == $salarie) {
                $ins->setNote($note);
                $ins->setAppreciation($appreciation);
                return 'Le salarié a bien été noté';
            }
        }
        return 'Notation impossible';
    }
}
