<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MemoireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *      collectionOperations={},
 
 * )
 * @ORM\Entity(repositoryClass=MemoireRepository::class)
 */
class Memoire
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
    private $titre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity=Critere::class, mappedBy="memoires")
     */
    private $criteres;

    /**
     * @ORM\OneToMany(targetEntity=Demandeempreint::class, mappedBy="memoire")
     */
    private $demandeempreints;

    public function __construct()
    {
        $this->criteres = new ArrayCollection();
        $this->demandeempreints = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, Critere>
     */
    public function getCriteres(): Collection
    {
        return $this->criteres;
    }

    public function addCritere(Critere $critere): self
    {
        if (!$this->criteres->contains($critere)) {
            $this->criteres[] = $critere;
            $critere->addMemoire($this);
        }

        return $this;
    }

    public function removeCritere(Critere $critere): self
    {
        if ($this->criteres->removeElement($critere)) {
            $critere->removeMemoire($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Demandeempreint>
     */
    public function getDemandeempreints(): Collection
    {
        return $this->demandeempreints;
    }

    public function addDemandeempreint(Demandeempreint $demandeempreint): self
    {
        if (!$this->demandeempreints->contains($demandeempreint)) {
            $this->demandeempreints[] = $demandeempreint;
            $demandeempreint->setMemoire($this);
        }

        return $this;
    }

    public function removeDemandeempreint(Demandeempreint $demandeempreint): self
    {
        if ($this->demandeempreints->removeElement($demandeempreint)) {
            // set the owning side to null (unless already changed)
            if ($demandeempreint->getMemoire() === $this) {
                $demandeempreint->setMemoire(null);
            }
        }

        return $this;
    }
}
