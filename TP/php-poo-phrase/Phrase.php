<?php


class Phrase{
    private string $phrase;

    public function __construct(string $phrase){
        $this->phrase = $phrase;
    }

    public function toString() : string {
        return $this->phrase;
    }

    public function calculerNombresMots() : string{
        return str_word_count($this->phrase);
    }


    public function getMotPosition(int $nb) : string{
        $phrase = explode(" ", $this->phrase);
        try {
            if ($nb > count($phrase)){
                throw new Exception("Il n'y a pas assez de mots dans la phrase pour en trouver un à cette position.");
            }elseif ($nb < 0){
                throw new Exception("La position ne peut pas être négative");
            }
            return $phrase[$nb-1];
        }catch(Exception $e){
            return "Erreur : ".$e->getMessage();
        }

    }


    public function getType() : string {
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

    public function calculerNombreLettres() : string {
        $phrase = str_replace(" ", "", $this->phrase);
//        return $phrase;
        return strlen($phrase);
    }

    public function getMotOccurence(string $mot) : string {
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