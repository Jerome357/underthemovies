<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PersonageRepository")
 */
class Personage
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
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\MoviePersonage", mappedBy="personage")
     */
    private $moviePersonages;

    public function __construct()
    {
        $this->moviePersonages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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
            $moviePersonage->setPersonage($this);
        }

        return $this;
    }

    public function removeMoviePersonage(MoviePersonage $moviePersonage): self
    {
        if ($this->moviePersonages->contains($moviePersonage)) {
            $this->moviePersonages->removeElement($moviePersonage);
            // set the owning side to null (unless already changed)
            if ($moviePersonage->getPersonage() === $this) {
                $moviePersonage->setPersonage(null);
            }
        }

        return $this;
    }
}
