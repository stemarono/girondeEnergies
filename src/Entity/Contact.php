<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use DateTime;
use Doctrine\DBAL\Types\Types;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContactRepository::class)]
class Contact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Assert\NotNull()]
    private ?int $id = null;

    #[ORM\Column(length: 63)]
    #[Assert\NotNull()]
    #[Assert\Regex(
        pattern:'/^[a-z]+$/i',
        htmlPattern:'^[a-zA-Z]+$'
    )]
    private ?string $nomContact = null;

    #[ORM\Column(length: 63)]
    #[Assert\NotNull()]
    #[Assert\Regex(
        pattern:'/^[a-z]+$/i',
        htmlPattern:'^[a-zA-Z]+$'
    )]
    private ?string $prenomContact = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotNull()]
    #[Assert\Regex('/^\w+/')]
    private ?string $message = null;

    #[ORM\Column(length: 320)]
    #[Assert\NotNull()]
    #[Assert\Email(
        message: 'l\'adresse mail {{ value }} n\'est pas valide.'
    )]
    private ?string $email = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Assert\Date]
    #[Assert\NotNull()]
    private ?\DateTimeInterface $dateCreation = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Assert\Date]
    #[Assert\NotNull()]
    private ?\DateTimeInterface $dateModification = null;

    function __construct()
    {
       $this->dateCreation= new DateTime('now'); 
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomContact(): ?string
    {
        return $this->nomContact;
    }

    public function setNomContact(string $nomContact): static
    {
        $this->nomContact = $nomContact;

        return $this;
    }

    public function getPrenomContact(): ?string
    {
        return $this->prenomContact;
    }

    public function setPrenomContact(string $prenomContact): static
    {
        $this->prenomContact = $prenomContact;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

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

  
    
}
