<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setPrenom("John");
        $user->setNom("Doe");
        $user->setEmail("test@gmail.com");
        $user->setRoles(array('ROLE_SUPER_ADMIN', 'ROLE_ADMIN','ROLE_USER'));
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            'admin'
        ));

        $manager->persist($user);
        $manager->flush();

    }
}
