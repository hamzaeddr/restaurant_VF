<?php

namespace App\Entity;

use App\Repository\FamillesSousRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FamillesSousRepository::class)
 */
class FamillesSous
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
    private $Id_FamilleSous;

    /**
     * @ORM\ManyToOne(targetEntity=Familles::class, inversedBy="n")
     */
    private $Id_famille;

    /**
     * @ORM\Column(type="string", length=80, nullable=true)
     */
    private $FamilleSous;

    /**
     * @ORM\Column(type="string", length=80, nullable=true)
     */
    private $SArabe;

    /**
     * @ORM\Column(type="string", length=80, nullable=true)
     */
    private $Description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Photo;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $Date_Sys;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdFamilleSous(): ?string
    {
        return $this->Id_FamilleSous;
    }

    public function setIdFamilleSous(string $Id_FamilleSous): self
    {
        $this->Id_FamilleSous = $Id_FamilleSous;

        return $this;
    }

    public function getIdFamille(): ?Familles
    {
        return $this->Id_famille;
    }

    public function setIdFamille(?Familles $Id_famille): self
    {
        $this->Id_famille = $Id_famille;

        return $this;
    }

    public function getFamilleSous(): ?string
    {
        return $this->FamilleSous;
    }

    public function setFamilleSous(?string $FamilleSous): self
    {
        $this->FamilleSous = $FamilleSous;

        return $this;
    }

    public function getSArabe(): ?string
    {
        return $this->SArabe;
    }

    public function setSArabe(?string $SArabe): self
    {
        $this->SArabe = $SArabe;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(?string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->Photo;
    }

    public function setPhoto(?string $Photo): self
    {
        $this->Photo = $Photo;

        return $this;
    }

    public function getDateSys(): ?string
    {
        return $this->Date_Sys;
    }

    public function setDateSys(?string $Date_Sys): self
    {
        $this->Date_Sys = $Date_Sys;

        return $this;
    }
}
