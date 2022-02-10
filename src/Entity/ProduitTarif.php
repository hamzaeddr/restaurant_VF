<?php

namespace App\Entity;

use App\Repository\ProduitTarifRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProduitTarifRepository::class)
 */
class ProduitTarif
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Produits::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $Id_Produit;

    /**
     * @ORM\ManyToOne(targetEntity=TypeTarif::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $Id_Tarif;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $Tarif_TTC;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $Taux;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $Tarif_HT;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Visib;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $Date_Sys;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getIdTarif(): ?TypeTarif
    {
        return $this->Id_Tarif;
    }

    public function setIdTarif(?TypeTarif $Id_Tarif): self
    {
        $this->Id_Tarif = $Id_Tarif;

        return $this;
    }

    public function getTarifTTC(): ?float
    {
        return $this->Tarif_TTC;
    }

    public function setTarifTTC(?float $Tarif_TTC): self
    {
        $this->Tarif_TTC = $Tarif_TTC;

        return $this;
    }

    public function getTaux(): ?float
    {
        return $this->Taux;
    }

    public function setTaux(?float $Taux): self
    {
        $this->Taux = $Taux;

        return $this;
    }

    public function getTarifHT(): ?float
    {
        return $this->Tarif_HT;
    }

    public function setTarifHT(?float $Tarif_HT): self
    {
        $this->Tarif_HT = $Tarif_HT;

        return $this;
    }

    public function getVisib(): ?int
    {
        return $this->Visib;
    }

    public function setVisib(?int $Visib): self
    {
        $this->Visib = $Visib;

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
