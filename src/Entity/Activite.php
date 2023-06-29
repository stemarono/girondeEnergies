<?php

namespace App\Entity;

use App\Repository\ActiviteRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ActiviteRepository::class)]
class Activite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 63)]
    private ?string $titreRealisation = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column]
    private ?bool $enProjet = null;

    #[ORM\Column(length: 255, nullable: true,unique:true)]
    private ?string $imageUrl = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateCreation = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateModification = null;

    #[ORM\ManyToOne(inversedBy: 'activites')]
    private ?Commune $commune = null;

    #[ORM\ManyToOne(inversedBy: 'activites')]
    private ?typeActivite $typeActivite = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitreRealisation(): ?string
    {
        return $this->titreRealisation;
    }

    public function setTitreRealisation(string $titreRealisation): static
    {
        $this->titreRealisation = $titreRealisation;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function isEnProjet(): ?bool
    {
        return $this->enProjet;
    }

    public function setEnProjet(bool $enProjet): static
    {
        $this->enProjet = $enProjet;

        return $this;
    }

    public function getImageUrl(): ?string
    {
        return $this->imageUrl;
    }

    public function setImageUrl(?string $imageUrl): static
    {
        $this->imageUrl = $imageUrl;

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

    public function getCommune(): ?Commune
    {
        return $this->commune;
    }

    public function setCommune(?Commune $commune): static
    {
        $this->commune = $commune;

        return $this;
    }

    public function getTypeActivite(): ?typeActivite
    {
        return $this->typeActivite;
    }

    public function setTypeActivite(?typeActivite $typeActivite): static
    {
        $this->typeActivite = $typeActivite;

        return $this;
    }
}
