<?php


class Texte{

    private array $texte;

    public function __construct(){
        $this->texte = [];
    }


    public function addTexteCompletInString(string $texte){
        $texte = str_replace(".", ".phraseDansTexte053", $texte);
        $texte = str_replace("!", "!phraseDansTexte053", $texte);
        $texte = str_replace("?", "?phraseDansTexte053", $texte);
        $texte = substr($texte, 0, strlen($texte)-18);
        $texte = explode("phraseDansTexte053", $texte);
        foreach ($texte as $phrase){
            if ($phrase[0] == " "){
                $phrase = substr($phrase, 1, strlen($phrase)-1);
            }
            $this->texte[] = new Phrase($phrase);
        }
    }

    public function addPhraseString(string $phrase) : void{
        $this->texte[] = new Phrase($phrase);
    }
    public function addPhraseObj(Phrase $phrase):void{
        $this->texte[] = $phrase;
    }

    public function toString(): string
    {
        $texte = "";
        foreach ($this->texte as $phrase){
            $texte .= $phrase->toString()." ";
        }
        return $texte;
    }

    public function subPhraseString(string $phrase){
        for($i = 0; $i < count($this->texte); $i++){
            $phraseText = $this->texte[$i];
            if (str_replace(" ", "", $phraseText->toString()) == str_replace(" ", "", $phrase)){
                unset($this->texte[$i]);
            }
        }
        $this->texte = array_merge($this->texte);
    }

    public function getNbPhrases() : int{
        return count($this->texte);
    }

    public function getNombresMots() : int{
        $compteur = 0;
        foreach ($this->texte as $phrase){
            $compteur += $phrase->calculerNombresMots();
        }
        return $compteur;
    }

    public function calculerNombreLettres() : int{
        $compteur = 0;
        foreach ($this->texte as $phrase){
            $compteur += $phrase->calculerNombreLettres();
        }
        return $compteur;
    }

    public function getNbDecla() : int{
        $compteur = 0;
        foreach ($this->texte as $phrase){
            if ($phrase->getType()=="Phrase déclarative."){
                $compteur += 1;
            }
        }
        return $compteur;
    }

    public function getNbExcla() : int{
        $compteur = 0;
        foreach ($this->texte as $phrase){
            if ($phrase->getType()=="Phrase exclamative."){
                $compteur += 1;
            }
        }
        return $compteur;
    }

    public function getNbInterro() : int{
        $compteur = 0;
        foreach ($this->texte as $phrase){
            if ($phrase->getType()=="Phrase interrogative."){
                $compteur += 1;
            }
        }
        return $compteur;
    }

    public function getOccurencesMot(string $mot) : int{
        $compteur = 0;
        foreach ($this->texte as $phrase){
            $compteur += $phrase->getMotOccurence($mot);
        }
        return $compteur;
    }

}