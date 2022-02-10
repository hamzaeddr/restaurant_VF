<?php

namespace App\Entity;

use App\Repository\ProduitsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProduitsRepository::class)
 */
class Produits
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
    private $Id_Produit;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Produit;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $Unite_Vente;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $Id_FamilleSousC;

    /**
     * @ORM\ManyToOne(targetEntity=TypeProduit::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $Id_Type_Produit;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Description;

    /**
     * @ORM\Column(type="string", length=80, nullable=true)
     */
    private $Codebarre;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $Photo;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $Photo_Born;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $orders;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Avoir_Acc;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Choix;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $Imprimante;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Visib;

    /**
     * @ORM\Column(type="string", length=80, nullable=true)
     */
    private $Id_Restaurant;

    /**
     * @ORM\Column(type="date")
     */
    private $Date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdProduit(): ?string
    {
        return $this->Id_Produit;
    }

    public function setIdProduit(string $Id_Produit): self
    {
        $this->Id_Produit = $Id_Produit;

        return $this;
    }

    public function getProduit(): ?string
    {
        return $this->Produit;
    }

    public function setProduit(?string $Produit): self
    {
        $this->Produit = $Produit;

        return $this;
    }

    public function getUniteVente(): ?string
    {
        return $this->Unite_Vente;
    }

    public function setUniteVente(?string $Unite_Vente): self
    {
        $this->Unite_Vente = $Unite_Vente;

        return $this;
    }

    public function getIdFamilleSousC(): ?string
    {
        return $this->Id_FamilleSousC;
    }

    public function setIdFamilleSousC(?string $Id_FamilleSousC): self
    {
        $this->Id_FamilleSousC = $Id_FamilleSousC;

        return $this;
    }

    public function getIdTypeProduit(): ?TypeProduit
    {
        return $this->Id_Type_Produit;
    }

    public function setIdTypeProduit(?TypeProduit $Id_Type_Produit): self
    {
        $this->Id_Type_Produit = $Id_Type_Produit;

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

    public function getCodebarre(): ?string
    {
        return $this->Codebarre;
    }

    public function setCodebarre(?string $Codebarre): self
    {
        $this->Codebarre = $Codebarre;

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

    public function getPhotoBorn(): ?string
    {
        return $this->Photo_Born;
    }

    public function setPhotoBorn(?string $Photo_Born): self
    {
        $this->Photo_Born = $Photo_Born;

        return $this;
    }

    public function getOrders(): ?int
    {
        return $this->orders;
    }

    public function setOrders(?int $orders): self
    {
        $this->orders = $orders;

        return $this;
    }

    public function getAvoirAcc(): ?int
    {
        return $this->Avoir_Acc;
    }

    public function setAvoirAcc(?int $Avoir_Acc): self
    {
        $this->Avoir_Acc = $Avoir_Acc;

        return $this;
    }

    public function getChoix(): ?int
    {
        return $this->Choix;
    }

    public function setChoix(?int $Choix): self
    {
        $this->Choix = $Choix;

        return $this;
    }

    public function getImprimante(): ?string
    {
        return $this->Imprimante;
    }

    public function setImprimante(?string $Imprimante): self
    {
        $this->Imprimante = $Imprimante;

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

    public function getIdRestaurant(): ?string
    {
        return $this->Id_Restaurant;
    }

    public function setIdRestaurant(?string $Id_Restaurant): self
    {
        $this->Id_Restaurant = $Id_Restaurant;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->Date;
    }

    public function setDate(\DateTimeInterface $Date): self
    {
        $this->Date = $Date;

        return $this;
    }
}
