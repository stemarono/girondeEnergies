<?php

namespace App\Entity;

use App\Repository\CommuneRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommuneRepository::class)]
class Commune
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 63)]
    private ?string $nomCommune = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Assert\Date]
    private ?\DateTimeInterface $dateCreation = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Assert\Date]
    private ?\DateTimeInterface $dateModification = null;

    #[ORM\OneToMany(mappedBy: 'commune', targetEntity: Activite::class)]
    private Collection $activites;

    #[ORM\OneToMany(mappedBy: 'commune', targetEntity: Precommande::class)]
    private Collection $precommandes;

    public function __construct()
    {
        $this->activites = new ArrayCollection();
        $this->precommandes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCommune(): ?string
    {
        return $this->nomCommune;
    }

    public function setNomCommune(string $nomCommune): static
    {
        $this->nomCommune = $nomCommune;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(\DateTimeInterface $dateCreation): static
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    public function getDateModification(): ?\DateTimeInterface
    {
        return $this->dateModification;
    }

    public function setDateModification(\DateTimeInterface $dateModification): static
    {
        $this->dateModification = $dateModification;

        return $this;
    }

    /**
     * @return Collection<int, Activite>
     */
    public function getActivites(): Collection
    {
        return $this->activites;
    }

    public function addActivite(Activite $activite): static
    {
        if (!$this->activites->contains($activite)) {
            $this->activites->add($activite);
            $activite->setCommune($this);
        }

        return $this;
    }

    public function removeActivite(Activite $activite): static
    {
        if ($this->activites->removeElement($activite)) {
            // set the owning side to null (unless already changed)
            if ($activite->getCommune() === $this) {
                $activite->setCommune(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Precommande>
     */
    public function getPrecommandes(): Collection
    {
        return $this->precommandes;
    }

    public function addPrecommande(Precommande $precommande): static
    {
        if (!$this->precommandes->contains($precommande)) {
            $this->precommandes->add($precommande);
            $precommande->setCommune($this);
        }

        return $this;
    }

    public function removePrecommande(Precommande $precommande): static
    {
        if ($this->precommandes->removeElement($precommande)) {
            // set the owning side to null (unless already changed)
            if ($precommande->getCommune() === $this) {
                $precommande->setCommune(null);
            }
        }

        return $this;
    }
    function __toString()
    {
        return $this->nomCommune;
    }
}
