<?php


class Phrase{
    private string $phrase;

    public function __construct($phrase){
        $this->phrase = $phrase;
    }

    public function toString(){
        return $this->phrase;
    }

    public function calculerNombresMots(){
        return str_word_count($this->phrase);
    }

    public function getMotPosition($nb){
        $phrase = explode(" ", $this->phrase);
        return $phrase[$nb-1];
    }

    public function getType(){
        $point =  $this->phrase[-1];
        if ($point == "."){
            return "Phrase déclarative.";
        }elseif ($point == "!"){
            return "Phrase exclamative.";
        }elseif($point == "?"){
            return "Phrase interrogative.";
        }else{
            return "Impossible de déterminer le type de phrase car il n'y a pas de point";
        }
    }

    public function calculerNombreLettres(){
        $phrase = str_replace(" ", "", $this->phrase);
        if ($phrase[-1] == "!" || $phrase[-1] == "." || $phrase[-1] == "?"){
            $phrase = substr($phrase, 0, strlen($phrase)-1);
        }
        return strlen($phrase);
    }

    public function getMotOccurence($mot){
        $phrase = explode(" ", $this->phrase);
        $compteur = 0;
        foreach ($phrase as $motPhrase){
            if ($motPhrase == $mot){
                $compteur += 1;
            }
        }
        return $compteur;
    }

}