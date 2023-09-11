<?php
namespace  App;
class Equipe{

    private string $nom;
    private int $nombreLikes;
    private string $entraineur;
    private string $anneeCreation;

    public function __construct(string $nom, string $entraineur, string $anneeCreation)
    {
        $this->nom = $nom;
        $this->nombreLikes = 0;
        $this->entraineur = $entraineur;
        $this->anneeCreation = $anneeCreation;
    }

    public function incrementerNbLikes():void
    {
        $this->nombreLikes += 1;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getNombreLikes(): int
    {
        return $this->nombreLikes;
    }

    public function getEntraineur(): string
    {
        return $this->entraineur;
    }

    public function getAnneeCreation(): string
    {
        return $this->anneeCreation;
    }



}