<?php

namespace App\Entity;

use App\Repository\ProduitChimiqueRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProduitChimiqueRepository::class)
 */
class ProduitChimique
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
    private $formule;

    /**
     * @ORM\Column(type="integer")
     */
    private $masse_molaire;

    /**
     * @ORM\Column(type="integer")
     */
    private $concentration_molaire;

    /**
     * @ORM\Column(type="integer")
     */
    private $concentration_massique;

    /**
     * @ORM\Column(type="integer")
     */
    private $masse;

    /**
     * @ORM\Column(type="integer")
     */
    private $volume;

    /**
     * @ORM\Column(type="integer")
     */
    private $duree_conservation;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantite;

    /**
     * @ORM\Column(type="date")
     */
    private $date_commande;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fournisseur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFormule(): ?string
    {
        return $this->formule;
    }

    public function setFormule(string $formule): self
    {
        $this->formule = $formule;

        return $this;
    }

    public function getMasseMolaire(): ?int
    {
        return $this->masse_molaire;
    }

    public function setMasseMolaire(int $masse_molaire): self
    {
        $this->masse_molaire = $masse_molaire;

        return $this;
    }

    public function getConcentrationMolaire(): ?int
    {
        return $this->concentration_molaire;
    }

    public function setConcentrationMolaire(int $concentration_molaire): self
    {
        $this->concentration_molaire = $concentration_molaire;

        return $this;
    }

    public function getConcentrationMassique(): ?int
    {
        return $this->concentration_massique;
    }

    public function setConcentrationMassique(int $concentration_massique): self
    {
        $this->concentration_massique = $concentration_massique;

        return $this;
    }

    public function getMasse(): ?int
    {
        return $this->masse;
    }

    public function setMasse(int $masse): self
    {
        $this->masse = $masse;

        return $this;
    }

    public function getVolume(): ?int
    {
        return $this->volume;
    }

    public function setVolume(int $volume): self
    {
        $this->volume = $volume;

        return $this;
    }

    public function getDureeConservation(): ?int
    {
        return $this->duree_conservation;
    }

    public function setDureeConservation(int $duree_conservation): self
    {
        $this->duree_conservation = $duree_conservation;

        return $this;
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

    public function getDateCommande(): ?\DateTimeInterface
    {
        return $this->date_commande;
    }

    public function setDateCommande(\DateTimeInterface $date_commande): self
    {
        $this->date_commande = $date_commande;

        return $this;
    }

    public function getFournisseur(): ?string
    {
        return $this->fournisseur;
    }

    public function setFournisseur(string $fournisseur): self
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
}
