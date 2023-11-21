<?php

namespace App\Entity;

use App\Repository\CoinCoinRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CoinCoinRepository::class)]
class CoinCoin
{

    /**
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="coinCoin")
     */
    private $comments;


    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $content = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $created_at = null;

    #[ORM\ManyToOne(inversedBy: 'coinCoins')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Duck $author = null;

    public function __construct()
    {
        $this->created_at = new \DateTimeImmutable();
    }


    public function getAuthor(): ?Duck
    {

        return $this->author;
    }

    public function setAuthor(?Duck $author): static
    {
        $this->author = $author;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): void
    {
        $this->content = $content;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(?\DateTimeInterface $created_at): void
    {
        $this->created_at = $created_at;
    }

    // Getter and setter methods for $comments

    public function getComments(): Collection
    {
        return $this->comments;
    }


}
