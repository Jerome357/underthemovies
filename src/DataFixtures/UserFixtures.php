<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;


class UserFixtures extends Fixture
{
    private $encoder;

    /**
     * UserFixtures constructor.
     * @param $encoder
     */
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $admin = new User();
        $admin->setEmail("jerome.duval35@hotmail.fr");
        $admin->setRoles(["ROLE_ADMIN"]);
        $password = $this->encoder->encodePassword($admin, '1234');
        $admin->setPassword($password);
        $admin->setUsername("jerome");
        $manager->persist($admin);
        $this->setReference("user-admin",$admin);

        $john = new User();
        $john->setEmail("john.doe@gmail.com");
        $john->setRoles(["ROLE_USER"]);
        $password = $this->encoder->encodePassword($john, '1234');
        $john->setPassword($password);
        $john->setUsername("john");
        $manager->persist($john);
        $this->setReference("user-john",$john);

        $manager->flush();
    }
}
