<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Table(name : "user")]
#[ORM\Entity(repositoryClass : UserRepository::class)]

class User implements UserInterface, PasswordAuthenticatedUserInterface
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type : "integer")]
    private $id;
 
    #[ORM\Column(type : "string", length : 180, unique : true)]
    #[Assert\NotBlank(message : "Compléter le champ email")]
    #[Assert\Email(message : "Le format de l'email n'est pas bon")]
    private $email;
     
    #[ORM\Column(name : "nom", type : "string", length : 255)]
    #[Assert\NotBlank(message : "Compléter le champ nom")]
    private $nom;

    #[ORM\Column(name : "prenom", type : "string", length : 255)]
    #[Assert\NotBlank(message : "Compléter le champ prénom")]
    private $prenom;

    #[ORM\Column(type : "json")]
    private $roles = [];

    #[ORM\Column(type : "string")]
    #[Assert\NotBlank(message : "Compléter le champ pasword")]
    private $password;

    #[ORM\Column(name : "is_active", type : "boolean")]
    private $isActive;

    public function __construct()
    {
        $this->isActive = true;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getIsActive()
    {
        return $this->isActive;
    }

    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    }

    public function reverseState()
    {
        $etat = $this->getIsActive();

        return !$etat;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    public function getUsername(): string
    {
        return (string) $this->email;
    }

    public function getRoles(): array
    {
        $roles = $this->roles;
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getSalt(): ?string
    {
        return null;
    }

    public function eraseCredentials()
    {

    }

    public function isEnabled()
    {
        return $this->isActive;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }
}