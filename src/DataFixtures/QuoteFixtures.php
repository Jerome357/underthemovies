<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Quote;

class QuoteFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $quote1 = new Quote();
        $quote1->setContent("Je te signale que les flics ont une fâcheuse tendance
        à remarquer les véhicules pleins de sang !");
        $quote1->setCreatedAt(new \DateTime("2018-04-25"));
        $quote1->addMoviePersonage($this->getReference("personage-juleswinnfield"));
        $this->setReference("quote1", $quote1);

        $quote2 = new Quote();
        $quote2->setContent("C’est à une demi-heure d’ici. J’y suis dans dix minutes.");
        $quote2->setCreatedAt(new \DateTime("2019-11-15"));
        $quote2->addMoviePersonage($this->getReference("personage-thewolf"));
        $this->setReference("quote2", $quote2);

        $manager->flush();
    }
}
