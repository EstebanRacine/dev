<?php

class Client
{
    private int $noClient;
    private string $nomClient;
    private string $telClient;
    private string $adresseClient;
    private string $villeClient;
    private string $paysClient;
    private string $cpClient;

    /**
     * @param int $noClient
     * @param string $nomClient
     * @param string $telClient
     * @param string $adresseClient
     * @param string $villeClient
     * @param string $paysClient
     * @param string $cpClient
     */
    public function __construct(
        int $noClient,
        string $nomClient,
        string $telClient,
        string $adresseClient,
        string $villeClient,
        string $paysClient,
        string $cpClient
    ) {
        $this->noClient = $noClient;
        $this->nomClient = $nomClient;
        $this->telClient = $telClient;
        $this->adresseClient = $adresseClient;
        $this->villeClient = $villeClient;
        $this->paysClient = $paysClient;
        $this->cpClient = $cpClient;
    }

    /**
     * @return int
     */
    public function getNoClient(): int
    {
        return $this->noClient;
    }

    /**
     * @return string
     */
    public function getNomClient(): string
    {
        return $this->nomClient;
    }

    /**
     * @return string
     */
    public function getTelClient(): string
    {
        return $this->telClient;
    }

    /**
     * @return string
     */
    public function getAdresseClient(): string
    {
        return $this->adresseClient;
    }

    /**
     * @return string
     */
    public function getVilleClient(): string
    {
        return $this->villeClient;
    }

    /**
     * @return string
     */
    public function getPaysClient(): string
    {
        return $this->paysClient;
    }

    /**
     * @return string
     */
    public function getCpClient(): string
    {
        return $this->cpClient;
    }
}
