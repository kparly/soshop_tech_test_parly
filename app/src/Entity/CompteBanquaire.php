<?php

namespace App\Entity;

use App\Repository\CompteBanquaireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass=CompteBanquaireRepository::class)
 * @Gedmo\SoftDeleteable(fieldName="deletedAt", timeAware=false, hardDelete=false)
 */
class CompteBanquaire
{
    use SoftDeleteableEntity;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $IBAN;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $BIC;

    /**
     * @ORM\Column(type="float")
     */
    private $balance;

    /**
     * @ORM\OneToMany(targetEntity=CarteBanquaire::class, mappedBy="compteBanquaire")
     */
    private $cartes_banquaire;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_compte_fourni;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateur::class, inversedBy="comptesBanquaire")
     * @ORM\JoinColumn(nullable=false)
     */
    private $utilisateur;

    public function __construct()
    {
        $this->cartes_banquaire = new ArrayCollection();
        $this->utilisateurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIBAN(): ?string
    {
        return $this->IBAN;
    }

    public function setIBAN(string $IBAN): self
    {
        $this->IBAN = $IBAN;

        return $this;
    }

    public function getBIC(): ?string
    {
        return $this->BIC;
    }

    public function setBIC(string $BIC): self
    {
        $this->BIC = $BIC;

        return $this;
    }

    public function getBalance(): ?float
    {
        return $this->balance;
    }

    public function setBalance(float $balance): self
    {
        $this->balance = $balance;

        return $this;
    }

    /**
     * @return Collection|CarteBanquaire[]
     */
    public function getCartesBanquaire(): Collection
    {
        return $this->cartes_banquaire;
    }

    public function addCartesBanquaire(CarteBanquaire $cartesBanquaire): self
    {
        if (!$this->cartes_banquaire->contains($cartesBanquaire)) {
            $this->cartes_banquaire[] = $cartesBanquaire;
            $cartesBanquaire->setCompteBanquaire($this);
        }

        return $this;
    }

    public function removeCartesBanquaire(CarteBanquaire $cartesBanquaire): self
    {
        if ($this->cartes_banquaire->removeElement($cartesBanquaire)) {
            // set the owning side to null (unless already changed)
            if ($cartesBanquaire->getCompteBanquaire() === $this) {
                $cartesBanquaire->setCompteBanquaire(null);
            }
        }

        return $this;
    }

    public function getIdCompteFourni(): ?int
    {
        return $this->id_compte_fourni;
    }

    public function setIdCompteFourni(int $id_compte_fourni): self
    {
        $this->id_compte_fourni = $id_compte_fourni;

        return $this;
    }

    /**
     * @return Collection|Utilisateur[]
     */
    public function getUtilisateurs(): Collection
    {
        return $this->utilisateurs;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * @return bool true si l'utilisateur n'est pas supprimer, false sinon
     * Permet de vérifier la validité d'un utilisateur
     */
    public function isUtilisateurDeletedAt(){
        if(is_null($this->utilisateur->getDeletedAt())){
            return true;
        }
        else{
            return false;
        }
    }
}
