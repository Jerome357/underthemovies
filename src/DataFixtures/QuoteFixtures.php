<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Quote;


class QuoteFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $quote1 = new Quote();
        $quote1->setContent("Je te signale que les flics ont une fâcheuse tendance
        à remarquer les véhicules pleins de sang !");
        $quote1->setCreatedAt(new \DateTime("2018-04-25"));
        $quote1->addMoviePersonage($this->getReference("moviepersonage-juleswinnfield"));
        $quote1->setUser($this->getReference("user-john"));
        $manager->persist($quote1);
        $this->setReference("quote1", $quote1);

        $quote2 = new Quote();
        $quote2->setContent("C’est à une demi-heure d’ici. J’y suis dans dix minutes.");
        $quote2->setCreatedAt(new \DateTime("2019-11-15"));
        $quote2->addMoviePersonage($this->getReference("moviepersonage-thewolf"));
        $quote2->setUser($this->getReference("user-john"));
        $manager->persist($quote2);
        $this->setReference("quote2", $quote2);

        $quote3 = new Quote();
        $quote3->setContent("Max, un gars dans le métro, ici, à Los Angeles il meurt, tu crois qu’on le remarquera ?");
        $quote3->setCreatedAt(new \DateTime("2015-05-9"));
        $quote3->addMoviePersonage($this->getReference("moviepersonage-vincent"));
        $quote3->addMoviePersonage($this->getReference("moviepersonage-max"));
        $quote3->setUser($this->getReference("user-admin"));
        $manager->persist($quote3);
        $this->setReference("quote3", $quote3);
        $manager->flush();

        $quote4 = new Quote();
        $quote4->setContent("Quel est le parasite le plus résistant : une bactérie, un virus, un ver intestinal ? … Une idée.");
        $quote4->setCreatedAt(new \DateTime("2017-07-23"));
        $quote4->addMoviePersonage($this->getReference("moviepersonage-cobb"));
        $quote4->setUser($this->getReference("user-admin"));
        $manager->persist($quote4);
        $this->setReference("quote4", $quote4);
        $manager->flush();

        $quote5 = new Quote();
        $quote5->setContent("Stephen: Je compte 6 balles négro ! Django: Je compte 2 flingues négro !");
        $quote5->setCreatedAt(new \DateTime("2019-11-19"));
        $quote5->addMoviePersonage($this->getReference("moviepersonage-django"));
        $quote5->addMoviePersonage($this->getReference("moviepersonage-stephen"));
        $quote5->setUser($this->getReference("user-john"));
        $manager->persist($quote5);
        $this->setReference("quote5", $quote5);
        $manager->flush();


    }

    /**
     * @return
     */
    public function getDependencies()
    {
        return [
            UserFixtures::class,
            MoviePersonageFixtures::class
        ];
    }
}
