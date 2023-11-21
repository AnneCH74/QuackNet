<?php

namespace App\Entity;

use App\Repository\DuckRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: DuckRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class Duck implements UserInterface, PasswordAuthenticatedUserInterface
{

    /**
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="duck")
     */
    private $comments;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 45)]
    private ?string $firstname = null;

    #[ORM\Column(length: 50)]
    private ?string $lastname = null;

    #[ORM\Column(length: 15)]
    private ?string $duckname = null;

    #[ORM\OneToMany(mappedBy: 'author', targetEntity: CoinCoin::class, orphanRemoval: true)]
    private Collection $coinCoins;

    public function __construct()
    {
        $this->coinCoins = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getDuckname(): ?string
    {
        return $this->duckname;
    }

    public function setDuckname(string $duckname): static
    {
        $this->duckname = $duckname;

        return $this;
    }

    /**
     * @return Collection<int, CoinCoin>
     */
    public function getCoinCoins(): Collection
    {
        return $this->coinCoins;
    }

    public function addCoinCoin(CoinCoin $coinCoin): static
    {
        if (!$this->coinCoins->contains($coinCoin)) {
            $this->coinCoins->add($coinCoin);
            $coinCoin->setAuthor($this);
        }

        return $this;
    }

    public function removeCoinCoin(CoinCoin $coinCoin): static
    {
        if ($this->coinCoins->removeElement($coinCoin)) {
            // set the owning side to null (unless already changed)
            if ($coinCoin->getAuthor() === $this) {
                $coinCoin->setAuthor(null);
            }
        }

        return $this;
    }

    // Getter and setter methods for $comments

    public function getComments(): Collection
    {
        return $this->comments;
    }

}
