<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommandeRepository::class)
 */
class Commande
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $dateCommande;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateRetraitCommande;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateur::class, inversedBy="commandes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $noClient;

    /**
     * @ORM\ManyToOne(targetEntity=Employe::class, inversedBy="commandes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $noEmploye;

    /**
     * @ORM\OneToMany(targetEntity=ProduitCommander::class, mappedBy="noCommande", orphanRemoval=true)
     */
    private $produitCommanders;

    public function __toString(): string
    {
        return (string) $this->id;
    }

    public function __construct()
    {
        $this->produitCommanders = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateCommande(): ?\DateTimeInterface
    {
        return $this->dateCommande;
    }

    public function setDateCommande(\DateTimeInterface $dateCommande): self
    {
        $this->dateCommande = $dateCommande;

        return $this;
    }

    public function getDateRetraitCommande(): ?\DateTimeInterface
    {
        return $this->dateRetraitCommande;
    }

    public function setDateRetraitCommande(?\DateTimeInterface $dateRetraitCommande): self
    {
        $this->dateRetraitCommande = $dateRetraitCommande;

        return $this;
    }

    public function getNoClient(): ?Utilisateur
    {
        return $this->noClient;
    }

    public function setNoClient(?Utilisateur $noClient): self
    {
        $this->noClient = $noClient;

        return $this;
    }

    public function getNoEmploye(): ?Employe
    {
        return $this->noEmploye;
    }

    public function setNoEmploye(?Employe $noEmploye): self
    {
        $this->noEmploye = $noEmploye;

        return $this;
    }

    /**
     * @return Collection|ProduitCommander[]
     */
    public function getProduitCommanders(): Collection
    {
        return $this->produitCommanders;
    }

    public function addProduitCommander(ProduitCommander $produitCommander): self
    {
        if (!$this->produitCommanders->contains($produitCommander)) {
            $this->produitCommanders[] = $produitCommander;
            $produitCommander->setNoCommande($this);
        }

        return $this;
    }

    public function removeProduitCommander(ProduitCommander $produitCommander): self
    {
        if ($this->produitCommanders->removeElement($produitCommander)) {
            // set the owning side to null (unless already changed)
            if ($produitCommander->getNoCommande() === $this) {
                $produitCommander->setNoCommande(null);
            }
        }

        return $this;
    }
}
