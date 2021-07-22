<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProduitRepository::class)
 */
class Produit
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $nom;

    /**
     * @ORM\Column(type="float")
     */
    private $prixUnitaire;

    /**
     * @ORM\Column(type="integer")
     */
    private $unitesStock;

    /**
     * @ORM\ManyToOne(targetEntity=CategorieProduit::class, inversedBy="produits")
     */
    private $categorie;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $imgProduit;

    /**
     * @ORM\OneToMany(targetEntity=ProduitCommander::class, mappedBy="produit", orphanRemoval=true)
     */
    private $produitCommanders;

    /**
     * @ORM\ManyToOne(targetEntity=Fournisseur::class, inversedBy="produits")
     * @ORM\JoinColumn(nullable=false)
     */
    private $fournisseur;

    public function __toString(): string
    {
        return (string) $this->id .' '. $this->nom;
    }

    public function __construct()
    {
        $this->produitCommanders = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrixUnitaire(): ?float
    {
        return $this->prixUnitaire;
    }

    public function setPrixUnitaire(float $prixUnitaire): self
    {
        $this->prixUnitaire = $prixUnitaire;

        return $this;
    }

    public function getUnitesStock(): ?int
    {
        return $this->unitesStock;
    }

    public function setUnitesStock(int $unitesStock): self
    {
        $this->unitesStock = $unitesStock;

        return $this;
    }

    public function getCategorie(): ?CategorieProduit
    {
        return $this->categorie;
    }

    public function setCategorie(?CategorieProduit $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getImgProduit(): ?string
    {
        return $this->imgProduit;
    }

    public function setImgProduit(string $imgProduit): self
    {
        $this->imgProduit = $imgProduit;

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
            $produitCommander->setProduit($this);
        }

        return $this;
    }

    public function removeProduitCommander(ProduitCommander $produitCommander): self
    {
        if ($this->produitCommanders->removeElement($produitCommander)) {
            // set the owning side to null (unless already changed)
            if ($produitCommander->getProduit() === $this) {
                $produitCommander->setProduit(null);
            }
        }

        return $this;
    }

    public function getFournisseur(): ?Fournisseur
    {
        return $this->fournisseur;
    }

    public function setFournisseur(?Fournisseur $fournisseur): self
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }
    
}
