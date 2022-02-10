<?php

namespace App\Entity;

use App\Repository\CarteRepartitionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CarteRepartitionRepository::class)
 */
class CarteRepartition
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
    private $Id_Repartition;

    /**
     * @ORM\OneToOne(targetEntity=Carte::class, cascade={"persist", "remove"})
     */
    private $Id_Carte;

    /**
     * @ORM\Column(type="string", length=80, nullable=true)
     */
    private $Repartition;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $Heure;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Pax;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $Id_Operation;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $Facturer;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $Date_Sys;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdRepartition(): ?string
    {
        return $this->Id_Repartition;
    }

    public function setIdRepartition(string $Id_Repartition): self
    {
        $this->Id_Repartition = $Id_Repartition;

        return $this;
    }

    public function getIdCarte(): ?Carte
    {
        return $this->Id_Carte;
    }

    public function setIdCarte(?Carte $Id_Carte): self
    {
        $this->Id_Carte = $Id_Carte;

        return $this;
    }

    public function getRepartition(): ?string
    {
        return $this->Repartition;
    }

    public function setRepartition(?string $Repartition): self
    {
        $this->Repartition = $Repartition;

        return $this;
    }

    public function getHeure(): ?string
    {
        return $this->Heure;
    }

    public function setHeure(?string $Heure): self
    {
        $this->Heure = $Heure;

        return $this;
    }

    public function getPax(): ?int
    {
        return $this->Pax;
    }

    public function setPax(?int $Pax): self
    {
        $this->Pax = $Pax;

        return $this;
    }

    public function getIdOperation(): ?string
    {
        return $this->Id_Operation;
    }

    public function setIdOperation(?string $Id_Operation): self
    {
        $this->Id_Operation = $Id_Operation;

        return $this;
    }

    public function getFacturer(): ?string
    {
        return $this->Facturer;
    }

    public function setFacturer(?string $Facturer): self
    {
        $this->Facturer = $Facturer;

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
