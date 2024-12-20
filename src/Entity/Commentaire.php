<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\CommentaireRepository;

#[ORM\Entity(repositoryClass: CommentaireRepository::class)]
class Commentaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'text')]
    private ?string $content = null;

    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $date = null;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class, inversedBy: 'commentaires')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Utilisateur $user = null;

    #[ORM\ManyToOne(targetEntity: Critique::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Critique $review = null;

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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;
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

    public function getReview(): ?Critique
    {
        return $this->review;
    }

    public function setReview(?Critique $review): self
    {
        $this->review = $review;
        return $this;
    }
}
