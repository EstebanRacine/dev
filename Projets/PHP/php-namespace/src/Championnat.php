<?php

namespace App;
use League\Csv\Reader;

    class Championnat{
        private string $nom;
        //ASSOCIATION ONE TO MANY AVEC EQUIPE
        /**
         * @var Equipe[]
         */
        private array $equipes;

        public function __construct(string $nom)
        {
            $this->nom = $nom;
            $this->equipes = [];
        }

        public function ajouterEquipe(Equipe $equipe):void
        {
            $this->equipes[] = $equipe;
        }

        public function importerEquipesCSV(string $path):void
        {
            $csv = Reader::createFromPath($path,'r');
            $csv->setDelimiter(';');
            $csv->setHeaderOffset(0);

            $records = $csv->getRecords();

            foreach ($records as $record){
                $equipe = new Equipe($record["Nom"],$record["Entraineur"],$record["Annee creation"]);
                $this->ajouterEquipe($equipe);
            }
        }

        public function getNbEquipes():int
        {
            return count($this->equipes);
        }
        public function getNom(): string
        {
            return $this->nom;
        }

        public function getEquipes(): array
        {
            return $this->equipes;
        }
    }