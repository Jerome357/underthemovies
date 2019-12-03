<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\MoviePersonage;


class MoviePersonageFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $moviepersonnage1 = new MoviePersonage();
        $moviepersonnage1->setPersonage($this->getReference("personage-juleswinnfield"));
        $moviepersonnage1->setPerson($this->getReference("actor-samuel l.jackson"));
        $moviepersonnage1->setMovie($this->getReference("movie-pulpfiction"));
        $manager->persist($moviepersonnage1);
        $this->setReference("moviepersonage-juleswinnfield", $moviepersonnage1);
        
        $moviepersonnage2 = new MoviePersonage();
        $moviepersonnage2->setPersonage($this->getReference("personage-thewolf"));
        $moviepersonnage2->setPerson($this->getReference("actor-harvey keitel"));
        $moviepersonnage2->setMovie($this->getReference("movie-pulpfiction"));
        $manager->persist($moviepersonnage2);
        $this->setReference("moviepersonage-thewolf", $moviepersonnage2);

        $moviepersonnage3 = new MoviePersonage();
        $moviepersonnage3->setPersonage($this->getReference("personage-cobb"));
        $moviepersonnage3->setPerson($this->getReference("actor-leonardo di caprio"));
        $moviepersonnage3->setMovie($this->getReference("movie-inception"));
        $manager->persist($moviepersonnage3);
        $this->setReference("moviepersonage-cobb", $moviepersonnage3);


        $manager->flush();
    }

/**
     * @return
     */
    public function getDependencies()
    {
        return [
            PersonageFixtures::class,
            PersonFixtures::class,
            MovieFixtures::class
        ];
    }
}
