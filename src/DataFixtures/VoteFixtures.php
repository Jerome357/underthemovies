<?php

namespace App\DataFixtures;

use App\Entity\Vote;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;


class VoteFixtures extends Fixture  implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $vote1 = new Vote;
        $vote1->setQuote($this->getReference("quote1"));
        $vote1->setUser($this->getReference("user-john"));
        $vote1->setGrade(1);
        $vote1->setComment("Super citation");
        $manager->persist($vote1);
        $this->setReference("movie-collateral", $vote1);

        $vote2 = new Vote;
        $vote2->setQuote($this->getReference("quote2"));
        $vote2->setUser($this->getReference("user-john"));
        $vote2->setGrade(0);
        $vote2->setComment("J'ai adoré");
        $manager->persist($vote2);
        $this->setReference("movie-collateral", $vote2);

        $manager->flush();
    }

    /**
     * @return
     */
    public function getDependencies()
    {
        return [
            UserFixtures::class,
            QuoteFixtures::class
        ];
    }
}
