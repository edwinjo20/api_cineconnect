<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\CritiqueRepository;

#[ORM\Entity(repositoryClass: CritiqueRepository::class)]
class Critique
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'text')]
    private ?string $content = null;

    #[ORM\Column(type: 'smallint')]
    private ?int $ratingGiven = null;

    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $publicationDate = null;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class, inversedBy: 'critiques')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Utilisateur $user = null;

    #[ORM\ManyToOne(targetEntity: Film::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Film $film = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;
        return $this;
    }

    public function getRatingGiven(): ?int
    {
        return $this->ratingGiven;
    }

    public function setRatingGiven(int $ratingGiven): self
    {
        $this->ratingGiven = $ratingGiven;
        return $this;
    }

    public function getPublicationDate(): ?\DateTimeInterface
    {
        return $this->publicationDate;
    }

    public function setPublicationDate(\DateTimeInterface $publicationDate): self
    {
        $this->publicationDate = $publicationDate;
        return $this;
    }

    public function getUser(): ?Utilisateur
    {
        return $this->user;
    }

    public function setUser(?Utilisateur $user): self
    {
        $this->user = $user;
        return $this;
    }

    public function getFilm(): ?Film
    {
        return $this->film;
    }

    public function setFilm(?Film $film): self
    {
        $this->film = $film;
        return $this;
    }
}
