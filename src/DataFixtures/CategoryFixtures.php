<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
Use App\Entity\Category;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $category1 = new Category();
        $category1->setName("Thriller");
        $manager->persist($category1);
        $this->setReference("thriller", $category1);

        $category2 = new Category();
        $category2->setName("SF");
        $manager->persist($category2);
        $this->setReference("sf", $category2);

        $category3 = new Category();
        $category3->setName("Drame");
        $manager->persist($category3);
        $this->setReference("drame", $category3);

        $manager->flush();
    }
}
