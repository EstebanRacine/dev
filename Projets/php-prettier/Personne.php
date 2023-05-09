<?php

class Personne {
    private int $age;
    private string $nom;
    private string $prenom;

    public function __construct(string $nom, string $prenom, int $age) {
        $this->nom = $nom;
        $this->age = $age;
        $this->prenom = $prenom;
    }

    public function getId(): string {
        return $this->prenom . ' ' . $this->nom;
    }
}
