<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\QuoteRepository")
 */
class Quote
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="quotes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Vote", mappedBy="quote")
     */
    private $votes;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\MoviePersonage", mappedBy="quotes")
     */
    private $moviePersonages;

    public function __construct()
    {
        $this->votes = new ArrayCollection();
        $this->moviePersonages = new ArrayCollection();
    }

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

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|Vote[]
     */
    public function getVotes(): Collection
    {
        return $this->votes;
    }

    public function addVote(Vote $vote): self
    {
        if (!$this->votes->contains($vote)) {
            $this->votes[] = $vote;
            $vote->setQuote($this);
        }

        return $this;
    }

    public function removeVote(Vote $vote): self
    {
        if ($this->votes->contains($vote)) {
            $this->votes->removeElement($vote);
            // set the owning side to null (unless already changed)
            if ($vote->getQuote() === $this) {
                $vote->setQuote(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|MoviePersonage[]
     */
    public function getMoviePersonages(): Collection
    {
        return $this->moviePersonages;
    }

    public function addMoviePersonage(MoviePersonage $moviePersonage): self
    {
        if (!$this->moviePersonages->contains($moviePersonage)) {
            $this->moviePersonages[] = $moviePersonage;
            $moviePersonage->addQuote($this);
        }

        return $this;
    }

    public function removeMoviePersonage(MoviePersonage $moviePersonage): self
    {
        if ($this->moviePersonages->contains($moviePersonage)) {
            $this->moviePersonages->removeElement($moviePersonage);
            $moviePersonage->removeQuote($this);
        }

        return $this;
    }
}
