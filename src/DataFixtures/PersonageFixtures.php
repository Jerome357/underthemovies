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


        $manager->flush();
    }
}
