<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 */
class Client
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $Id_Client;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Client;

    /**
     * @ORM\ManyToOne(targetEntity=TypeClient::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $Type_Client;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Morale;

    /**
     * @ORM\ManyToOne(targetEntity=TypeTarif::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $Id_Tarif;

    /**
     * @ORM\Column(type="string", length=80, nullable=true)
     */
    private $Contact;

    /**
     * @ORM\Column(type="string", length=80, nullable=true)
     */
    private $Portable;

    /**
     * @ORM\Column(type="string", length=80, nullable=true)
     */
    private $Email;

    /**
     * @ORM\Column(type="string", length=80, nullable=true)
     */
    private $Obs;

    /**
     * @ORM\Column(type="string", length=80, nullable=true)
     */
    private $Active;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $Date_Sys;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdClient(): ?string
    {
        return $this->Id_Client;
    }

    public function setIdClient(string $Id_Client): self
    {
        $this->Id_Client = $Id_Client;

        return $this;
    }

    public function getClient(): ?string
    {
        return $this->Client;
    }

    public function setClient(?string $Client): self
    {
        $this->Client = $Client;

        return $this;
    }

    public function getTypeClient(): ?TypeClient
    {
        return $this->Type_Client;
    }

    public function setTypeClient(?TypeClient $Type_Client): self
    {
        $this->Type_Client = $Type_Client;

        return $this;
    }

    public function getMorale(): ?int
    {
        return $this->Morale;
    }

    public function setMorale(?int $Morale): self
    {
        $this->Morale = $Morale;

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

    public function getContact(): ?string
    {
        return $this->Contact;
    }

    public function setContact(?string $Contact): self
    {
        $this->Contact = $Contact;

        return $this;
    }

    public function getPortable(): ?string
    {
        return $this->Portable;
    }

    public function setPortable(?string $Portable): self
    {
        $this->Portable = $Portable;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(?string $Email): self
    {
        $this->Email = $Email;

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

    public function getActive(): ?string
    {
        return $this->Active;
    }

    public function setActive(?string $Active): self
    {
        $this->Active = $Active;

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
