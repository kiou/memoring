<?php

namespace App\Entity;

use App\Repository\FaqRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Table(name : "faq")]
#[ORM\HasLifecycleCallbacks]
#[ORM\Entity(repositoryClass: FaqRepository::class)]
class Faq
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type : "integer")]
    private ?int $id = null;

    #[ORM\Column(type : "datetimetz")]
    private $created;

    #[ORM\Column(type : "datetimetz", nullable:true)]
    private $changed;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message : "Compléter le champ Question")]
    private ?string $question = null;

    #[ORM\Column(type : "text")]
    #[Assert\NotBlank(message : "Compléter le champ Contenu")]
    private ?string $contenu = null;

    #[ORM\Column(name : "is_active", type : "boolean")]
    private $isActive;

    public function __construct()
    {
        $this->created = new \DateTime();
        $this->isActive = true;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreated(): ?\DateTimeInterface
    {
        return $this->created;
    }

    public function setCreated(\DateTimeInterface $created): self
    {
        $this->created = $created;

        return $this;
    }

    public function getQuestion(): ?string
    {
        return $this->question;
    }

    public function setQuestion(string $question): self
    {
        $this->question = $question;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function isIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): self
    {
        $this->isActive = $isActive;

        return $this;
    }

    public function getChanged(): ?\DateTimeInterface
    {
        return $this->changed;
    }

    public function setChanged(\DateTimeInterface $changed): self
    {
        $this->changed = $changed;

        return $this;
    }

    #[ORM\PreUpdate()]
    public function preChanged()
    {
        $this->changed = new \DateTime();
    }
}
