<?php

namespace App\Entity;

use App\Repository\PartenaireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=PartenaireRepository::class)
 */
class Partenaire implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Partenaire_username;

    /**
     * @ORM\Column(type="string", length=255)
     *@Assert\Email(
     *   message = "L'adresse Email: {{ value }} n'est pas valide."
     * )
     */
    private $Email;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     *      min = 8,
     *      max = 30,
     *      minMessage = "Votre mot de passe doit faire {{ limit }} caractères minimun",
     *      maxMessage = "Votre mot de passe ne doit pas dépasser les {{ limit }} caractères"
     * )
     */
    private $password;

    /**
     * @Assert\EqualTo(propertyPath="password", message="Les deux mots de passe ne sont pas les mêmes")
     */
    public $Confirm_Password;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\ManyToMany(targetEntity=Game::class, inversedBy="partenaires")
     */
    private $title;

    public function __construct()
    {
        $this->title = new ArrayCollection();
        $this->createdAt = new \DateTime('now');
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    // public function getPartenaireUsername(): ?string
    public function getUsername(): ?string
    {
        return $this->Partenaire_username;
    }

    public function setUsername(string $Partenaire_username): self
    {
        $this->Partenaire_username = $Partenaire_username;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

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

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {

        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return Collection|Game[]
     */
    public function getTitle(): Collection
    {
        return $this->title;
    }

    public function addTitle(Game $title): self
    {
        if (!$this->title->contains($title)) {
            $this->title[] = $title;
        }

        return $this;
    }

    public function removeTitle(Game $title): self
    {
        $this->title->removeElement($title);

        return $this;
    }
    public function eraseCredentials()
    {
    }

    public function getSalt()
    {
    }

    public function getRoles()
    {
        return ['ROLE_USER'];
    }
}
