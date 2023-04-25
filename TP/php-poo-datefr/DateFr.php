<?php


class DateFr{
    private DateTime $date;

    public function __construct(string $date){
        $this->date = DateTime::createFromFormat("d/m/Y", $date);
    }

    public function format(){
        return $this->date->format("d/m/Y");
    }

    public function ajouterJour($nb){
        $this->date->modify("+$nb days");
        $this->format();
    }

    public function soustraireJour($nb){
        $this->date->modify("-$nb days");
        $this->format();
    }

    public function ajouterMois($nb){
        $this->date->modify("+$nb month");
        $this->format();
    }

    public function soustraireMois($nb){
        $this->date->modify("-$nb month");
        $this->format();
    }

    public function diffJours($dateBis){
        $inter = $this->date->diff($dateBis->date);
        return $inter->format("%a jours");
    }

}