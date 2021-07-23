<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;

/**
 * @ORM\Entity(repositoryClass=UtilisateurRepository::class)
 * @Gedmo\SoftDeleteable(fieldName="deletedAt", timeAware=false, hardDelete=false)
 */
class Utilisateur
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="date")
     */
    private $date_naissance;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telephone;

    /**
     * @ORM\OneToMany(targetEntity=CompteBanquaire::class, mappedBy="utilisateur", orphanRemoval=true)
     */
    private $comptesBanquaire;

    public function __construct()
    {
        $this->comptesBanquaire = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->date_naissance;
    }

    public function setDateNaissance(\DateTimeInterface $date_naissance): self
    {
        $this->date_naissance = $date_naissance;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * @return Collection|CompteBanquaire[]
     */
    public function getComptesBanquaire(): Collection
    {
        return $this->comptesBanquaire;
    }

    public function addComptesBanquaire(CompteBanquaire $comptesBanquaire): self
    {
        if (!$this->comptesBanquaire->contains($comptesBanquaire)) {
            $this->comptesBanquaire[] = $comptesBanquaire;
            $comptesBanquaire->setUtilisateur($this);
        }

        return $this;
    }

    public function removeComptesBanquaire(CompteBanquaire $comptesBanquaire): self
    {
        if ($this->comptesBanquaire->removeElement($comptesBanquaire)) {
            // set the owning side to null (unless already changed)
            if ($comptesBanquaire->getUtilisateur() === $this) {
                $comptesBanquaire->setUtilisateur(null);
            }
        }

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDeletedAt(): ?DateTime
    {
        return $this->deletedAt;
    }
}
