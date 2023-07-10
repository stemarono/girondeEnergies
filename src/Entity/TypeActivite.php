<?php

namespace App\Entity;

use App\Repository\TypeActiviteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeActiviteRepository::class)]
class TypeActivite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50,unique:true)]
    private ?string $typeactivite = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $descriptionTypeActivite = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Assert\Date]
    private ?\DateTimeInterface $dateCreation = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Assert\Date]
    private ?\DateTimeInterface $dateModification = null;

    #[ORM\OneToMany(mappedBy: 'typeActivite', targetEntity: Activite::class)]
    private Collection $activites;

    #[ORM\OneToMany(mappedBy: 'typeActivite', targetEntity: Precommande::class)]
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

    public function getTypeactivite(): ?string
    {
        return $this->typeactivite;
    }

    public function setTypeactivite(string $typeactivite): static
    {
        $this->typeactivite = $typeactivite;

        return $this;
    }

    public function getDescriptionTypeActivite(): ?string
    {
        return $this->descriptionTypeActivite;
    }

    public function setDescriptionTypeActivite(?string $descriptionTypeActivite): static
    {
        $this->descriptionTypeActivite = $descriptionTypeActivite;

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
            $activite->setTypeActivite($this);
        }

        return $this;
    }

    public function removeActivite(Activite $activite): static
    {
        if ($this->activites->removeElement($activite)) {
            // set the owning side to null (unless already changed)
            if ($activite->getTypeActivite() === $this) {
                $activite->setTypeActivite(null);
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
            $precommande->setTypeActivite($this);
        }

        return $this;
    }

    public function removePrecommande(Precommande $precommande): static
    {
        if ($this->precommandes->removeElement($precommande)) {
            // set the owning side to null (unless already changed)
            if ($precommande->getTypeActivite() === $this) {
                $precommande->setTypeActivite(null);
            }
        }

        return $this;
    }

    function __toString()
    {
        return $this->typeactivite;
    }
}
