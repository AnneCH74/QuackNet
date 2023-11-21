<?php

namespace App\Entity;

use App\Repository\CommentRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Duck;
use App\Entity\CoinCoin;

#[ORM\Entity(repositoryClass: CommentRepository::class)]
class Comment
{

    /**
     * @ORM\ManyToOne(targetEntity="Duck", inversedBy="comments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $duck;

    /**
     * @ORM\ManyToOne(targetEntity="CoinCoin", inversedBy="comments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $coinCoin;

    /**
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="coinCoin")
     */
    private $comments;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Comments = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(length: 255)]
    private ?string $createdBy = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getComments(): ?string
    {
        return $this->Comments;
    }

    public function setComments(string $Comments): static
    {
        $this->Comments = $Comments;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getCreatedBy(): ?string
    {
        return $this->createdBy;
    }

    public function setCreatedBy(string $createdBy): static
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    // Getter and setter methods for $duck and $coinCoin

    public function getDuck(): ?Duck
    {
        return $this->duck;
    }

    public function setDuck(?Duck $duck): static
    {
        $this->duck = $duck;

        return $this;
    }

    public function getCoinCoin(): ?CoinCoin
    {
        return $this->coinCoin;
    }

    public function setCoinCoin(?CoinCoin $coinCoin): static
    {
        $this->coinCoin = $coinCoin;

        return $this;

}

// Getter and setter methods for $comments

  /*  public function getComments(): Collection
    {
        return $this->comments;
    }*/

}
