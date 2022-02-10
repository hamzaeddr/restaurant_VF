<?php

namespace App\Entity;

use App\Repository\CarteLgRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CarteLgRepository::class)
 */
class CarteLg
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
    private $Id_Carte_Lg;

    /**
     * @ORM\ManyToOne(targetEntity=CarteRepartition::class)
     */
    private $Id_Repartition;

    /**
     * @ORM\ManyToOne(targetEntity=Produits::class)
     */
    private $Id_Produit;

    /**
     * @ORM\ManyToOne(targetEntity=Carte::class)
     */
    private $Id_Carte;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $Stock_Carte;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $Unite;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Stock_Cmd;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Stock_Carte_Temp;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $Stock_Reste;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $Date_Sys;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdCarteLg(): ?int
    {
        return $this->Id_Carte_Lg;
    }

    public function setIdCarteLg(int $Id_Carte_Lg): self
    {
        $this->Id_Carte_Lg = $Id_Carte_Lg;

        return $this;
    }

    public function getIdRepartition(): ?CarteRepartition
    {
        return $this->Id_Repartition;
    }

    public function setIdRepartition(?CarteRepartition $Id_Repartition): self
    {
        $this->Id_Repartition = $Id_Repartition;

        return $this;
    }

    public function getIdProduit(): ?Produits
    {
        return $this->Id_Produit;
    }

    public function setIdProduit(?Produits $Id_Produit): self
    {
        $this->Id_Produit = $Id_Produit;

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

    public function getStockCarte(): ?string
    {
        return $this->Stock_Carte;
    }

    public function setStockCarte(?string $Stock_Carte): self
    {
        $this->Stock_Carte = $Stock_Carte;

        return $this;
    }

    public function getUnite(): ?string
    {
        return $this->Unite;
    }

    public function setUnite(?string $Unite): self
    {
        $this->Unite = $Unite;

        return $this;
    }

    public function getStockCmd(): ?int
    {
        return $this->Stock_Cmd;
    }

    public function setStockCmd(?int $Stock_Cmd): self
    {
        $this->Stock_Cmd = $Stock_Cmd;

        return $this;
    }

    public function getStockCarteTemp(): ?int
    {
        return $this->Stock_Carte_Temp;
    }

    public function setStockCarteTemp(?int $Stock_Carte_Temp): self
    {
        $this->Stock_Carte_Temp = $Stock_Carte_Temp;

        return $this;
    }

    public function getStockReste(): ?string
    {
        return $this->Stock_Reste;
    }

    public function setStockReste(?string $Stock_Reste): self
    {
        $this->Stock_Reste = $Stock_Reste;

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
