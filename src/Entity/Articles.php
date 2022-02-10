<?php

namespace App\Entity;

use App\Repository\ArticlesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArticlesRepository::class)
 */
class Articles
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Id_Article;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Atricle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Id_FamilleSous;

    /**
     * @ORM\Column(type="text")
     */
    private $Description;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    private $Marque;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    private $Emballage;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $Codebarre;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Unite_Achat;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Unite_Sortie;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    private $Emplacement;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $Prix_Achat;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $Stock_Min;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $Stock_Max;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Photo;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $GererStock;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Activer;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Composer;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    private $Id_Restaurant;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $Date_Sys;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdArticle(): ?string
    {
        return $this->Id_Article;
    }

    public function setIdArticle(string $Id_Article): self
    {
        $this->Id_Article = $Id_Article;

        return $this;
    }

    public function getAtricle(): ?string
    {
        return $this->Atricle;
    }

    public function setAtricle(string $Atricle): self
    {
        $this->Atricle = $Atricle;

        return $this;
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

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getMarque(): ?string
    {
        return $this->Marque;
    }

    public function setMarque(?string $Marque): self
    {
        $this->Marque = $Marque;

        return $this;
    }

    public function getEmballage(): ?string
    {
        return $this->Emballage;
    }

    public function setEmballage(?string $Emballage): self
    {
        $this->Emballage = $Emballage;

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

    public function getUniteAchat(): ?int
    {
        return $this->Unite_Achat;
    }

    public function setUniteAchat(?int $Unite_Achat): self
    {
        $this->Unite_Achat = $Unite_Achat;

        return $this;
    }

    public function getUniteSortie(): ?int
    {
        return $this->Unite_Sortie;
    }

    public function setUniteSortie(?int $Unite_Sortie): self
    {
        $this->Unite_Sortie = $Unite_Sortie;

        return $this;
    }

    public function getEmplacement(): ?string
    {
        return $this->Emplacement;
    }

    public function setEmplacement(?string $Emplacement): self
    {
        $this->Emplacement = $Emplacement;

        return $this;
    }

    public function getPrixAchat(): ?float
    {
        return $this->Prix_Achat;
    }

    public function setPrixAchat(?float $Prix_Achat): self
    {
        $this->Prix_Achat = $Prix_Achat;

        return $this;
    }

    public function getStockMin(): ?float
    {
        return $this->Stock_Min;
    }

    public function setStockMin(?float $Stock_Min): self
    {
        $this->Stock_Min = $Stock_Min;

        return $this;
    }

    public function getStockMax(): ?float
    {
        return $this->Stock_Max;
    }

    public function setStockMax(?float $Stock_Max): self
    {
        $this->Stock_Max = $Stock_Max;

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

    public function getGererStock(): ?int
    {
        return $this->GererStock;
    }

    public function setGererStock(?int $GererStock): self
    {
        $this->GererStock = $GererStock;

        return $this;
    }

    public function getActiver(): ?int
    {
        return $this->Activer;
    }

    public function setActiver(?int $Activer): self
    {
        $this->Activer = $Activer;

        return $this;
    }

    public function getComposer(): ?int
    {
        return $this->Composer;
    }

    public function setComposer(?int $Composer): self
    {
        $this->Composer = $Composer;

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
