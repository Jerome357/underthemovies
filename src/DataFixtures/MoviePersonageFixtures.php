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

        $moviepersonage4 = new MoviePersonage();
        $moviepersonage4->setPersonage($this->getReference("personage-vincent"));
        $moviepersonage4->setPerson($this->getReference("actor-tom cruise"));
        $moviepersonage4->setMovie($this->getReference("movie-collateral"));
        $manager->persist($moviepersonage4);
        $this->setReference("moviepersonage-vincent", $moviepersonage4);

        $moviepersonage5 = new MoviePersonage();
        $moviepersonage5->setPersonage($this->getReference("personage-max"));
        $moviepersonage5->setPerson($this->getReference("actor-jamie foxx"));
        $moviepersonage5->setMovie($this->getReference("movie-collateral"));
        $manager->persist($moviepersonage5);
        $this->setReference("moviepersonage-max", $moviepersonage5);

        $moviepersonage6 = new MoviePersonage();
        $moviepersonage6->setPersonage($this->getReference("personage-django"));
        $moviepersonage6->setPerson($this->getReference("actor-jamie foxx"));
        $moviepersonage6->setMovie($this->getReference("movie-django"));
        $manager->persist($moviepersonage6);
        $this->setReference("moviepersonage-django", $moviepersonage6);

        $moviepersonage7 = new MoviePersonage();
        $moviepersonage7->setPersonage($this->getReference("personage-stephen"));
        $moviepersonage7->setPerson($this->getReference("actor-samuel l.jackson"));
        $moviepersonage7->setMovie($this->getReference("movie-django"));
        $manager->persist($moviepersonage7);
        $this->setReference("moviepersonage-stephen", $moviepersonage7);

        $moviepersonage8 = new MoviePersonage();
        $moviepersonage8->setPersonage($this->getReference("personage-calvin"));
        $moviepersonage8->setPerson($this->getReference("actor-leonardo di caprio"));
        $moviepersonage8->setMovie($this->getReference("movie-django"));
        $manager->persist($moviepersonage8);
        $this->setReference("moviepersonage-calvin", $moviepersonage8);

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
