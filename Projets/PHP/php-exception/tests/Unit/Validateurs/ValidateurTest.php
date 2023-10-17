<?php

namespace Tests\Unit\Validateurs;

use App\Exceptions\MotDePasseException;
use App\Exceptions\NombreException;
use App\Validateurs\Validateur;
use PHPUnit\Framework\TestCase;

class ValidateurTest extends TestCase
{
    /**
     * @test
     */
    public function verifierNombre_NombrePositif_True(){
        $validateur = new Validateur();

        $result = $validateur->verifierNombre(10);

        $this->assertTrue($result);
    }

    /**
     * @test
     */
    public function verifierNombre_NombreNegatif_NombreException(){
        $validateur = new Validateur();
        $this->expectException(NombreException::class);
        $this->expectExceptionMessage("Le nombre n'est pas positif.");

        $result = $validateur->verifierNombre(-10);
    }

    /**
     * @test
     */
    public function verifierMotDePasse_MDPValide_True(){
        $validateur = new Validateur();
        $this->assertTrue($validateur->verifierMotDePasse("M0tDeP4sseV4l1d3"));
    }

    /**
     * @test
     */
    public function verifierMotDePasse_MDPTropCourt_MotDePasseException(){
        $validateur = new Validateur();
        $this->expectException(MotDePasseException::class);
        $this->expectExceptionMessage("Le mot de passe est trop court.");
        $result = $validateur->verifierMotDePasse("C0urt");
    }

    /**
     * @test
     */
    public function verifierMotDePasse_BesoinMajuscule_MotDePasseException(){
        $validateur = new Validateur();
        $this->expectException(MotDePasseException::class);
        $this->expectExceptionMessage("Le mot de passe doit contenir au minimum une majuscule.");
        $result = $validateur->verifierMotDePasse("besoindemajuscule12");
    }

    /**
     * @test
     */
    public function verifierMotDePasse_BesoinMinuscule_MotDePasseException(){
        $validateur = new Validateur();
        $this->expectException(MotDePasseException::class);
        $this->expectExceptionMessage("Le mot de passe doit contenir au minimum une minuscule.");
        $result = $validateur->verifierMotDePasse("BESOINDEMINUSCULE12");
    }

    /**
     * @test
     */
    public function verifierMotDePasse_BesoinChiffre_MotDePasseException(){
        $validateur = new Validateur();
        $this->expectException(MotDePasseException::class);
        $this->expectExceptionMessage("Le mot de passe doit contenir au minimum un chiffre.");
        $result = $validateur->verifierMotDePasse("BesoinDeChiffre");
    }

}