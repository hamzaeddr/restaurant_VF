<?php

namespace App\Entity;

use App\Repository\TypeClientRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeClientRepository::class)
 */
class TypeClient
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
    private $Id_Type_Client;

    /**
     * @ORM\Column(type="string", length=80, nullable=true)
     */
    private $Type_Client;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdTypeClient(): ?int
    {
        return $this->Id_Type_Client;
    }

    public function setIdTypeClient(int $Id_Type_Client): self
    {
        $this->Id_Type_Client = $Id_Type_Client;

        return $this;
    }

    public function getTypeClient(): ?string
    {
        return $this->Type_Client;
    }

    public function setTypeClient(?string $Type_Client): self
    {
        $this->Type_Client = $Type_Client;

        return $this;
    }
}
