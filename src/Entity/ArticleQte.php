<?php

namespace App\Entity;

use App\Repository\ArticleQteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArticleQteRepository::class)
 */
class ArticleQte
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Articles::class, cascade={"persist", "remove"})
     */
    private $Id_Article;

    /**
     * @ORM\Column(type="string", length=40, nullable=true)
     */
    private $Id_Depot;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $Stock_Actuel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdArticle(): ?Articles
    {
        return $this->Id_Article;
    }

    public function setIdArticle(?Articles $Id_Article): self
    {
        $this->Id_Article = $Id_Article;

        return $this;
    }

    public function getIdDepot(): ?string
    {
        return $this->Id_Depot;
    }

    public function setIdDepot(?string $Id_Depot): self
    {
        $this->Id_Depot = $Id_Depot;

        return $this;
    }

    public function getStockActuel(): ?float
    {
        return $this->Stock_Actuel;
    }

    public function setStockActuel(?float $Stock_Actuel): self
    {
        $this->Stock_Actuel = $Stock_Actuel;

        return $this;
    }
}
