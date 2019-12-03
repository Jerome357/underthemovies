<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MovieRepository")
 */
class Movie
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $picture;

    /**
     * @ORM\Column(type="date")
     */
    private $releaseDate;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Person", inversedBy="movies")
     * @ORM\JoinColumn(nullable=false)
     */
    private $director;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Category", inversedBy="movies")
     */
    private $categories;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\MoviePersonage", mappedBy="movie")
     */
    private $moviePersonages;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
        $this->moviePersonages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getReleaseDate(): ?\DateTimeInterface
    {
        return $this->releaseDate;
    }

    public function setReleaseDate(\DateTimeInterface $releaseDate): self
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }

    public function getDirector(): ?Person
    {
        return $this->director;
    }

    public function setDirector(?Person $director): self
    {
        $this->director = $director;

        return $this;
    }

    /**
     * @return Collection|Category[]
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Category $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
        }

        return $this;
    }

    public function removeCategory(Category $category): self
    {
        if ($this->categories->contains($category)) {
            $this->categories->removeElement($category);
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
            $moviePersonage->setMovie($this);
        }

        return $this;
    }

    public function removeMoviePersonage(MoviePersonage $moviePersonage): self
    {
        if ($this->moviePersonages->contains($moviePersonage)) {
            $this->moviePersonages->removeElement($moviePersonage);
            // set the owning side to null (unless already changed)
            if ($moviePersonage->getMovie() === $this) {
                $moviePersonage->setMovie(null);
            }
        }

        return $this;
    }
}
