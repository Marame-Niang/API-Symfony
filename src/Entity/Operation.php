<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\OperationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=OperationRepository::class)
 */
class Operation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0, nullable=true)
     */
    private $depot;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0, nullable=true)
     */
    private $retrait;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0, nullable=true)
     */
    private $virement;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0, nullable=true)
     */
    private $taxe;

    /**
     * @ORM\ManyToOne(targetEntity=Compte::class, inversedBy="operations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $compte;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDepot(): ?string
    {
        return $this->depot;
    }

    public function setDepot(?string $depot): self
    {
        $this->depot = $depot;

        return $this;
    }

    public function getRetrait(): ?string
    {
        return $this->retrait;
    }

    public function setRetrait(?string $retrait): self
    {
        $this->retrait = $retrait;

        return $this;
    }

    public function getVirement(): ?string
    {
        return $this->virement;
    }

    public function setVirement(?string $virement): self
    {
        $this->virement = $virement;

        return $this;
    }

    public function getTaxe(): ?string
    {
        return $this->taxe;
    }

    public function setTaxe(?string $taxe): self
    {
        $this->taxe = $taxe;

        return $this;
    }

    public function getCompte(): ?Compte
    {
        return $this->compte;
    }

    public function setCompte(?Compte $compte): self
    {
        $this->compte = $compte;

        return $this;
    }
}
