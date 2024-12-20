<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity]
class Utilisateur implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255, unique: true)]
    private ?string $email = null;

    #[ORM\Column(type: 'string', length: 255)]
    private ?string $username = null;

    #[ORM\Column(type: 'string')]
    private ?string $password = null;

    #[ORM\Column(type: 'string', length: 20)]
    private ?string $role = 'ROLE_USER';

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Critique::class, cascade: ['persist', 'remove'])]
    private Collection $critiques;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Commentaire::class, cascade: ['persist', 'remove'])]
    private Collection $commentaires;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Favorites::class, cascade: ['persist', 'remove'])]
    private Collection $favorites;

    public function __construct()
    {
        $this->critiques = new ArrayCollection();
        $this->commentaires = new ArrayCollection();
        $this->favorites = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;
        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;
        return $this;
    }

    public function getRoles(): array
    {
        return [$this->role];
    }

    public function eraseCredentials(): void
    {
    }

    public function getUserIdentifier(): string
    {
        return $this->email;
    }
}
