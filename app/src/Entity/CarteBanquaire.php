<?php

namespace App\Entity;

use App\Repository\CarteBanquaireRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;

/**
 * @ORM\Entity(repositoryClass=CarteBanquaireRepository::class)
 * @Gedmo\SoftDeleteable(fieldName="deletedAt", timeAware=false, hardDelete=false)
 */
class CarteBanquaire
{
    use SoftDeleteableEntity;

    //Constante de statut
    const ACTIVE = 'active';
    const FERMEE = 'fermée';
    const VOLEE = 'volée';

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $numero_carte;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_carte;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $statut;

    /**
     * @ORM\ManyToOne(targetEntity=CompteBanquaire::class, inversedBy="cartes_banquaire")
     * @ORM\JoinColumn(nullable=false)
     */
    private $compteBanquaire;

    /**
     * @ORM\Column(type="date")
     */
    private $date_expiration;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroCarte(): ?int
    {
        return $this->numero_carte;
    }

    public function setNumeroCarte(int $numero_carte): self
    {
        $this->numero_carte = $numero_carte;

        return $this;
    }

    public function getIdCarte(): ?int
    {
        return $this->id_carte;
    }

    public function setIdCarte(int $id_carte): self
    {
        $this->id_carte = $id_carte;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getCompteBanquaire(): ?CompteBanquaire
    {
        return $this->compteBanquaire;
    }

    public function setCompteBanquaire(?CompteBanquaire $compteBanquaire): self
    {
        $this->compteBanquaire = $compteBanquaire;

        return $this;
    }

    public function getDateExpiration(): ?\DateTimeInterface
    {
        return $this->date_expiration;
    }

    public function setDateExpiration(\DateTimeInterface $date_expiration): self
    {
        $this->date_expiration = $date_expiration;

        return $this;
    }
}
