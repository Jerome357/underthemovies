<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Person;

class PersonFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $Person1 = new Person();
        $Person1->setFirstname("Tarantino");
        $Person1->setLastname("Quentin");
        $this->setReference("movie-pulpfiction", $Person1);

        $manager->flush();
    }
}
