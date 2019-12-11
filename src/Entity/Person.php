<?php
namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity(repositoryClass="App\Repository\PersonRepository")
 */
class Person
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
    private $firstname;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Movie", mappedBy="director")
     */
    private $movies;
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\MoviePersonage", mappedBy="person")
     */
    private $moviePersonages;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $picture;
    public function __construct()
    {
        $this->movies = new ArrayCollection();
        $this->moviePersonages = new ArrayCollection();
    }
    public function getId(): ?int
    {
        return $this->id;
    }
    public function getFirstname(): ?string
    {
        return $this->firstname;
    }
    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;
        return $this;
    }
    public function getLastname(): ?string
    {
        return $this->lastname;
    }
    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;
        return $this;
    }
    /**
     * @return Collection|Movie[]
     */
    public function getMovies(): Collection
    {
        return $this->movies;
    }
    public function addMovie(Movie $movie): self
    {
        if (!$this->movies->contains($movie)) {
            $this->movies[] = $movie;
            $movie->setDirector($this);
        }
        return $this;
    }
    public function removeMovie(Movie $movie): self
    {
        if ($this->movies->contains($movie)) {
            $this->movies->removeElement($movie);
            // set the owning side to null (unless already changed)
            if ($movie->getDirector() === $this) {
                $movie->setDirector(null);
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
            $moviePersonage->setPerson($this);
        }
        return $this;
    }
    public function removeMoviePersonage(MoviePersonage $moviePersonage): self
    {
        if ($this->moviePersonages->contains($moviePersonage)) {
            $this->moviePersonages->removeElement($moviePersonage);
            // set the owning side to null (unless already changed)
            if ($moviePersonage->getPerson() === $this) {
                $moviePersonage->setPerson(null);
            }
        }
        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }
}