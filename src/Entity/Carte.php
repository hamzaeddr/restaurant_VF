<?php

namespace App\Entity;

use App\Repository\CarteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CarteRepository::class)
 */
class Carte
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $Id_Carte;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $Date_Creation;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $Id_Dossier;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $Id_Client;

    /**
     * @ORM\Column(type="string", length=80, nullable=true)
     */
    private $Id_Beneficiare;

    /**
     * @ORM\Column(type="string", length=80, nullable=true)
     */
    private $Type_Client;

    /**
     * @ORM\Column(type="string", length=80, nullable=true)
     */
    private $Nom_Carte;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $Dtae_Validite;

    /**
     * @ORM\ManyToOne(targetEntity=TypeTarif::class)
     */
    private $Id_Tarif;

    /**
     * @ORM\Column(type="string", length=80, nullable=true)
     */
    private $Id_Restaurant;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $Id_User;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Generer;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Facturer;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Annuler;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Obs;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $Date_Sys;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdCarte(): ?string
    {
        return $this->Id_Carte;
    }

    public function setIdCarte(string $Id_Carte): self
    {
        $this->Id_Carte = $Id_Carte;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->Date_Creation;
    }

    public function setDateCreation(?\DateTimeInterface $Date_Creation): self
    {
        $this->Date_Creation = $Date_Creation;

        return $this;
    }

    public function getIdDossier(): ?string
    {
        return $this->Id_Dossier;
    }

    public function setIdDossier(?string $Id_Dossier): self
    {
        $this->Id_Dossier = $Id_Dossier;

        return $this;
    }

    public function getIdClient(): ?Client
    {
        return $this->Id_Client;
    }

    public function setIdClient(?Client $Id_Client): self
    {
        $this->Id_Client = $Id_Client;

        return $this;
    }

    public function getIdBeneficiare(): ?string
    {
        return $this->Id_Beneficiare;
    }

    public function setIdBeneficiare(?string $Id_Beneficiare): self
    {
        $this->Id_Beneficiare = $Id_Beneficiare;

        return $this;
    }

    public function getTypeClient(): ?string
    {
        return $this->Type_Client;
    }

    public function setTypeClient(?string $Type_Client): self
    {
        $this->Type_Client = $Type_Client;

        return $this;
    }

    public function getNomCarte(): ?string
    {
        return $this->Nom_Carte;
    }

    public function setNomCarte(?string $Nom_Carte): self
    {
        $this->Nom_Carte = $Nom_Carte;

        return $this;
    }

    public function getDtaeValidite(): ?\DateTimeInterface
    {
        return $this->Dtae_Validite;
    }

    public function setDtaeValidite(?\DateTimeInterface $Dtae_Validite): self
    {
        $this->Dtae_Validite = $Dtae_Validite;

        return $this;
    }

    public function getIdTarif(): ?TypeTarif
    {
        return $this->Id_Tarif;
    }

    public function setIdTarif(?TypeTarif $Id_Tarif): self
    {
        $this->Id_Tarif = $Id_Tarif;

        return $this;
    }

    public function getIdRestaurant(): ?string
    {
        return $this->Id_Restaurant;
    }

    public function setIdRestaurant(?string $Id_Restaurant): self
    {
        $this->Id_Restaurant = $Id_Restaurant;

        return $this;
    }

    public function getIdUser(): ?string
    {
        return $this->Id_User;
    }

    public function setIdUser(?string $Id_User): self
    {
        $this->Id_User = $Id_User;

        return $this;
    }

    public function getGenerer(): ?int
    {
        return $this->Generer;
    }

    public function setGenerer(?int $Generer): self
    {
        $this->Generer = $Generer;

        return $this;
    }

    public function getFacturer(): ?int
    {
        return $this->Facturer;
    }

    public function setFacturer(?int $Facturer): self
    {
        $this->Facturer = $Facturer;

        return $this;
    }

    public function getAnnuler(): ?int
    {
        return $this->Annuler;
    }

    public function setAnnuler(?int $Annuler): self
    {
        $this->Annuler = $Annuler;

        return $this;
    }

    public function getObs(): ?string
    {
        return $this->Obs;
    }

    public function setObs(?string $Obs): self
    {
        $this->Obs = $Obs;

        return $this;
    }

    public function getDateSys(): ?\DateTimeInterface
    {
        return $this->Date_Sys;
    }

    public function setDateSys(?\DateTimeInterface $Date_Sys): self
    {
        $this->Date_Sys = $Date_Sys;

        return $this;
    }
}
