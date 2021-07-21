<?php

namespace App\Entity;

use App\Repository\ProduitCommanderRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProduitCommanderRepository::class)
 */
class ProduitCommander
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
    private $quantite;

    /**
     * @ORM\ManyToOne(targetEntity=Commande::class, inversedBy="produitCommanders")
     * @ORM\JoinColumn(nullable=false)
     */
    private $noCommande;

    /**
     * @ORM\ManyToOne(targetEntity=Produit::class, inversedBy="produitCommanders")
     * @ORM\JoinColumn(nullable=false)
     */
    private $produit;

    public function __toString(): string
    {
        return (string) $this->getProduit();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getNoCommande(): ?Commande
    {
        return $this->noCommande;
    }

    public function setNoCommande(?Commande $noCommande): self
    {
        $this->noCommande = $noCommande;

        return $this;
    }

    public function getProduit(): ?Produit
    {
        return $this->produit;
    }

    public function setProduit(?Produit $produit): self
    {
        $this->produit = $produit;

        return $this;
    }
}
