<?php

namespace App\Entity;

use App\Repository\FamillesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FamillesRepository::class)
 */
class Familles
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
    private $Id_Famille;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $Famille;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $FArabe;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Photo;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $Date_sys;

    /**
     * @ORM\OneToMany(targetEntity=FamillesSous::class, mappedBy="Id_famille")
     */
    private $n;

    public function __construct()
    {
        $this->n = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdFamille(): ?string
    {
        return $this->Id_Famille;
    }

    public function setIdFamille(string $Id_Famille): self
    {
        $this->Id_Famille = $Id_Famille;

        return $this;
    }

    public function getFamille(): ?string
    {
        return $this->Famille;
    }

    public function setFamille(?string $Famille): self
    {
        $this->Famille = $Famille;

        return $this;
    }

    public function getFArabe(): ?string
    {
        return $this->FArabe;
    }

    public function setFArabe(?string $FArabe): self
    {
        $this->FArabe = $FArabe;

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

    public function getDateSys(): ?\DateTimeInterface
    {
        return $this->Date_sys;
    }

    public function setDateSys(?\DateTimeInterface $Date_sys): self
    {
        $this->Date_sys = $Date_sys;

        return $this;
    }

    /**
     * @return Collection|FamillesSous[]
     */
    public function getN(): Collection
    {
        return $this->n;
    }

    public function addN(FamillesSous $n): self
    {
        if (!$this->n->contains($n)) {
            $this->n[] = $n;
            $n->setIdFamille($this);
        }

        return $this;
    }

    public function removeN(FamillesSous $n): self
    {
        if ($this->n->removeElement($n)) {
            // set the owning side to null (unless already changed)
            if ($n->getIdFamille() === $this) {
                $n->setIdFamille(null);
            }
        }

        return $this;
    }
}
