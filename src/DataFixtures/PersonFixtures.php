<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Person;

class PersonFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $Director1 = new Person();
        $Director1->setFirstname("Quentin");
        $Director1->setLastname("Tarantino");
        $manager->persist($Director1);
        $this->setReference("director-tarantino", $Director1);

        $Director2 = new Person();
        $Director2->setFirstname("Michael");
        $Director2->setLastname("Mann");
        $manager->persist($Director2);
        $this->setReference("director-mann", $Director2);

        $Director3 = new Person();
        $Director3->setFirstname("Christopher");
        $Director3->setLastname("Nolan");
        $manager->persist($Director3);
        $this->setReference("director-nolan", $Director3);

        $Actor1 = new Person();
        $Actor1->setFirstname("Samuel");
        $Actor1->setLastname("L.Jackson");
        $manager->persist($Actor1);
        $this->setReference("actor-samuel l.jackson", $Actor1);
        
        $Actor2 = new Person();
        $Actor2->setFirstname("Harvey");
        $Actor2->setLastname("Keitel");
        $manager->persist($Actor2);
        $this->setReference("actor-harvey keitel", $Actor2);

        $Actor3 = new Person();
        $Actor3->setFirstname("Leonardo");
        $Actor3->setLastname("Di Caprio");
        $manager->persist($Actor3);
        $this->setReference("actor-leonardo di caprio", $Actor3);





        $manager->flush();
    }
}
