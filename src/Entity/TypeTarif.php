<?php

namespace App\Entity;

use App\Repository\TypeTarifRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeTarifRepository::class)
 */
class TypeTarif
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $Id_Tarif;

    /**
     * @ORM\Column(type="string", length=40, nullable=true)
     */
    private $Tarif;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Id_Tva;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Par_Defaut;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdTarif(): ?int
    {
        return $this->Id_Tarif;
    }

    public function setIdTarif(int $Id_Tarif): self
    {
        $this->Id_Tarif = $Id_Tarif;

        return $this;
    }

    public function getTarif(): ?string
    {
        return $this->Tarif;
    }

    public function setTarif(?string $Tarif): self
    {
        $this->Tarif = $Tarif;

        return $this;
    }

    public function getIdTva(): ?int
    {
        return $this->Id_Tva;
    }

    public function setIdTva(?int $Id_Tva): self
    {
        $this->Id_Tva = $Id_Tva;

        return $this;
    }

    public function getParDefaut(): ?int
    {
        return $this->Par_Defaut;
    }

    public function setParDefaut(?int $Par_Defaut): self
    {
        $this->Par_Defaut = $Par_Defaut;

        return $this;
    }
}
