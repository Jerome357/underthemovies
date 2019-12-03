<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Movie;

class MovieFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $movie1 = new Movie();
        $movie1->setTitle("Pulp Fiction");
        $movie1->setPicture("pulpfiction.png");
        $movie1->setReleaseDate(new \DateTime("1994"));
        $movie1->setDirector($this->getReference("director-tarantino"));
        $movie1->getCategories($this->getReference("thriller"));
        $manager->persist($movie1);
        $this->setReference("movie-pulpfiction", $movie1);

        $movie2 = new Movie();
        $movie2->setTitle("Collatéral");
        $movie2->setPicture("collateral.png");
        $movie2->setReleaseDate(new \DateTime("2004"));
        $movie2->setDirector($this->getReference("director-mann"));
        $movie2->getCategories($this->getReference("drame"));
        $manager->persist($movie2);
        $this->setReference("movie-collateral", $movie2);

        $movie3 = new Movie();
        $movie3->setTitle("Inception");
        $movie3->setPicture("Inception.png");
        $movie3->setReleaseDate(new \DateTime("2010"));
        $movie3->setDirector($this->getReference("director-nolan"));
        $movie3->getCategories($this->getReference("sf"));
        $manager->persist($movie3);
        $this->setReference("movie-inception", $movie3);


        $manager->flush();
    }

    /**
     * @return
     */
    public function getDependencies()
    {
        return [
            PersonFixtures::class,
            CategoryFixtures::class
        ];
    }
}





