<?php

namespace App\Entity;

use App\Repository\TypeProduitRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeProduitRepository::class)
 */
class TypeProduit
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
    private $Id_Type_Produit;

    /**
     * @ORM\Column(type="string", length=80, nullable=true)
     */
    private $Type_produit;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdTypeProduit(): ?int
    {
        return $this->Id_Type_Produit;
    }

    public function setIdTypeProduit(int $Id_Type_Produit): self
    {
        $this->Id_Type_Produit = $Id_Type_Produit;

        return $this;
    }

    public function getTypeProduit(): ?string
    {
        return $this->Type_produit;
    }

    public function setTypeProduit(?string $Type_produit): self
    {
        $this->Type_produit = $Type_produit;

        return $this;
    }
}
