<?php

class Emprunt
{
    protected Media $media;
    protected DateTime $dateEmprunt;
    protected DateTime $dateRetourEstimee;
    protected DateTime|null $dateRetour;

    /**
     * @param DateTime $dateEmprunt
     * @param DateTime $dateRetourEstimee
     * @param DateTime $dateRetour
     */
    public function __construct(Media $media)
    {
        $this->media = $media;
        $this->dateEmprunt = new DateTime("midnight");
        $nbJoursEmprunt = $this->media->getDureeEmprunt();
        $this->dateRetourEstimee = $this->dateEmprunt->add(DateInterval::createFromDateString("$nbJoursEmprunt days"));
        $this->dateRetour = null;
    }

    /**
     * @param DateTime $dateRetour
     */
    public function setDateRetour(DateTime $dateRetour): void
    {
        $this->dateRetour = $dateRetour;
    }

    public function getInformations() : string{
        $result = "Media emprunté : ".PHP_EOL.PHP_EOL.$this->media->getInformations() .PHP_EOL.PHP_EOL.
            "Date d'emprunt : ".$this->dateEmprunt->format("d/m/Y").PHP_EOL.
            "Date de retour estimée : ".$this->dateRetourEstimee->format("d/m/Y").PHP_EOL;
        if ($this->dateRetour != null){
            $result.= "Date de retour : ".$this->dateRetour->format("d/m/Y");
        }
        return $result;
    }

    public function empruntEnCours():bool{
        if ($this->dateRetour == null){
            return true;
        }
        return false;
    }

    public function empruntEnAlerte():bool{
        $dateDuJour = new DateTime("midnight");
        if($this->empruntEnCours() && $this->dateRetourEstimee->getTimestamp() < $dateDuJour->getTimestamp()){
            return true;
        }
        return false;
    }

    public function dureeMaxDepassee():bool{
        $dateDuJour = new DateTime("midnight");
        if(!$this->empruntEnCours()){
            if($this->dateRetour->getTimestamp() > $this->dateRetourEstimee->getTimestamp()){
                return true;
            }
        }
        return false;
    }


}