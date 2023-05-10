<?php

require_once 'Salarie.php';

class Inscription {
    private float $note;
    private string $appreciation;
    private Salarie $salarie;

    /**
     * @param float $note
     * @param string $appreciation
     * @param Salarie $salarie
     */
    public function __construct(Salarie $salarie) {
        $this->salarie = $salarie;
    }

    /**
     * @param float $note
     */
    public function setNote(float $note): void
    {
        $this->note = $note;
    }

    /**
     * @param string $appreciation
     */
    public function setAppreciation(string $appreciation): void
    {
        $this->appreciation = $appreciation;
    }

    /**
     * @return Salarie
     */
    public function getSalarie(): Salarie
    {
        return $this->salarie;
    }



}
