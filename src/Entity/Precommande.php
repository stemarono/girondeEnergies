<?php

namespace App\Entity;

use App\Repository\PrecommandeRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PrecommandeRepository::class)]
class Precommande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    
    private ?int $id = null;

    #[ORM\Column(length: 63)]
    private ?string $nomStructure = null;

    #[ORM\Column(length: 63)]
    private ?string $nomDemandeur = null;

    #[ORM\Column(length: 63)]
    private ?string $prenomDemandeur = null;

    #[ORM\Column(length: 320,unique:true)]
    #[Assert\Email(
        message:'cette adresse mail {{value}} n\'est pas une adresse valide.',
    )]
    private ?string $emailDemandeur = null;

    #[ORM\Column(length: 15)]
    private ?string $telephoneDemandeur = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 63)]
    private ?string $localisation = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Assert\Date]
    private ?\DateTimeInterface $dateCreation = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Assert\Date]
    private ?\DateTimeInterface $dateModification = null;

    #[ORM\ManyToOne(inversedBy: 'precommandes')]
    private ?Commune $commune = null;

    #[ORM\ManyToOne(inversedBy: 'precommandes')]
    private ?TypeActivite $typeActivite = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomStructure(): ?string
    {
        return $this->nomStructure;
    }

    public function setNomStructure(string $nomStructure): static
    {
        $this->nomStructure = $nomStructure;

        return $this;
    }

    public function getNomDemandeur(): ?string
    {
        return $this->nomDemandeur;
    }

    public function setNomDemandeur(string $nomDemandeur): static
    {
        $this->nomDemandeur = $nomDemandeur;

        return $this;
    }

    public function getPrenomDemandeur(): ?string
    {
        return $this->prenomDemandeur;
    }

    public function setPrenomDemandeur(string $prenomDemandeur): static
    {
        $this->prenomDemandeur = $prenomDemandeur;

        return $this;
    }

    public function getEmailDemandeur(): ?string
    {
        return $this->emailDemandeur;
    }

    public function setEmailDemandeur(string $emailDemandeur): static
    {
        $this->emailDemandeur = $emailDemandeur;

        return $this;
    }

    public function getTelephoneDemandeur(): ?string
    {
        return $this->telephoneDemandeur;
    }

    public function setTelephoneDemandeur(string $telephoneDemandeur): static
    {
        $this->telephoneDemandeur = $telephoneDemandeur;

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

    public function getLocalisation(): ?string
    {
        return $this->localisation;
    }

    public function setLocalisation(string $localisation): static
    {
        $this->localisation = $localisation;

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

    public function getTypeActivite(): ?TypeActivite
    {
        return $this->typeActivite;
    }

    public function setTypeActivite(?TypeActivite $typeActivite): static
    {
        $this->typeActivite = $typeActivite;

        return $this;
    }
}
