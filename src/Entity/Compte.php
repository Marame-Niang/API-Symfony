<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CompteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=CompteRepository::class)
 */
class Compte
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=8)
     */
    private $numero;

    /**
     * @ORM\Column(type="string", length=9)
     */
    private $rib;

    /**
     * @ORM\Column(type="float")
     */
    private $solde;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $dateOuverture;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $fraisOuverture;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $remuneration;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $dateDebut;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $dateFin;

    /**
     * @ORM\ManyToOne(targetEntity=Entreprise::class, inversedBy="comptes")
     */
    private $entreprise;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="comptes")
     */
    private $client;

    /**
     * @ORM\ManyToOne(targetEntity=TypeCompte::class, inversedBy="comptes")
     */
    private $typeCompte;

    /**
     * @ORM\OneToMany(targetEntity=Operation::class, mappedBy="compte")
     */
    private $operations;

    public function __construct()
    {
        $this->operations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getRib(): ?string
    {
        return $this->rib;
    }

    public function setRib(string $rib): self
    {
        $this->rib = $rib;

        return $this;
    }

    public function getSolde(): ?float
    {
        return $this->solde;
    }

    public function setSolde(float $solde): self
    {
        $this->solde = $solde;

        return $this;
    }

    public function getDateOuverture(): ?string
    {
        return $this->dateOuverture;
    }

    public function setDateOuverture(string $dateOuverture): self
    {
        $this->dateOuverture = $dateOuverture;

        return $this;
    }

    public function getFraisOuverture(): ?float
    {
        return $this->fraisOuverture;
    }

    public function setFraisOuverture(?float $fraisOuverture): self
    {
        $this->fraisOuverture = $fraisOuverture;

        return $this;
    }

    public function getRemuneration(): ?float
    {
        return $this->remuneration;
    }

    public function setRemuneration(?float $remuneration): self
    {
        $this->remuneration = $remuneration;

        return $this;
    }

    public function getDateDebut(): ?string
    {
        return $this->dateDebut;
    }

    public function setDateDebut(?string $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?string
    {
        return $this->dateFin;
    }

    public function setDateFin(?string $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    public function getEntreprise(): ?Entreprise
    {
        return $this->entreprise;
    }

    public function setEntreprise(?Entreprise $entreprise): self
    {
        $this->entreprise = $entreprise;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getTypeCompte(): ?TypeCompte
    {
        return $this->typeCompte;
    }

    public function setTypeCompte(?TypeCompte $typeCompte): self
    {
        $this->typeCompte = $typeCompte;

        return $this;
    }

    /**
     * @return Collection|Operation[]
     */
    public function getOperations(): Collection
    {
        return $this->operations;
    }

    public function addOperation(Operation $operation): self
    {
        if (!$this->operations->contains($operation)) {
            $this->operations[] = $operation;
            $operation->setCompte($this);
        }

        return $this;
    }

    public function removeOperation(Operation $operation): self
    {
        if ($this->operations->contains($operation)) {
            $this->operations->removeElement($operation);
            // set the owning side to null (unless already changed)
            if ($operation->getCompte() === $this) {
                $operation->setCompte(null);
            }
        }

        return $this;
    }
}
