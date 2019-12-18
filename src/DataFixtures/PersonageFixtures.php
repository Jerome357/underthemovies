<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Personage;

class PersonageFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $personage1 = new Personage();
        $personage1->setName("Jules Winnfield");
        $manager->persist($personage1);
        $this->setReference("personage-juleswinnfield", $personage1);

        $personage2 = new Personage();
        $personage2->setName("The Wolf");
        $manager->persist($personage2);
        $this->setReference("personage-thewolf", $personage2);

        $personage3 = new Personage();
        $personage3->setName("Cobb");
        $manager->persist($personage3);
        $this->setReference("personage-cobb", $personage3);

        $personage4 = new Personage();
        $personage4->setName("Vincent");
        $manager->persist($personage4);
        $this->setReference("personage-vincent", $personage4);

        $personage5 = new Personage();
        $personage5->setName("Max");
        $manager->persist($personage5);
        $this->setReference("personage-max", $personage5);

        $personage6 = new Personage();
        $personage6->setName("Django");
        $manager->persist($personage6);
        $this->setReference("personage-django", $personage6);

        $personage7 = new Personage();
        $personage7->setName("Stephen");
        $manager->persist($personage7);
        $this->setReference("personage-stephen", $personage7);

        $personage8 = new Personage();
        $personage8->setName("Calvin Candie");
        $manager->persist($personage8);
        $this->setReference("personage-calvin", $personage8);


        $manager->flush();
    }
}
