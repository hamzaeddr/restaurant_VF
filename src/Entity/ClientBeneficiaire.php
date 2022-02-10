<?php

namespace App\Entity;

use App\Repository\ClientBeneficiaireRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClientBeneficiaireRepository::class)
 */
class ClientBeneficiaire
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=80)
     */
    private $Id_beneficiare;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $Id_Client;

    /**
     * @ORM\Column(type="string", length=80, nullable=true)
     */
    private $Benefiaciare;

    /**
     * @ORM\Column(type="string", length=80, nullable=true)
     */
    private $Abrev;

    /**
     * @ORM\Column(type="string", length=80, nullable=true)
     */
    private $Responsable;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Id_Tarif;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $Date_Sys;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdBeneficiare(): ?string
    {
        return $this->Id_beneficiare;
    }

    public function setIdBeneficiare(string $Id_beneficiare): self
    {
        $this->Id_beneficiare = $Id_beneficiare;

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

    public function getBenefiaciare(): ?string
    {
        return $this->Benefiaciare;
    }

    public function setBenefiaciare(?string $Benefiaciare): self
    {
        $this->Benefiaciare = $Benefiaciare;

        return $this;
    }

    public function getAbrev(): ?string
    {
        return $this->Abrev;
    }

    public function setAbrev(?string $Abrev): self
    {
        $this->Abrev = $Abrev;

        return $this;
    }

    public function getResponsable(): ?string
    {
        return $this->Responsable;
    }

    public function setResponsable(?string $Responsable): self
    {
        $this->Responsable = $Responsable;

        return $this;
    }

    public function getIdTarif(): ?int
    {
        return $this->Id_Tarif;
    }

    public function setIdTarif(?int $Id_Tarif): self
    {
        $this->Id_Tarif = $Id_Tarif;

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
