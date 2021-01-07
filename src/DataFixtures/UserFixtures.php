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
        $superAdmin = new User();
        $superAdmin->setPrenom("John");
        $superAdmin->setNom("Doe");
        $superAdmin->setEmail("superAdmin@gmail.com");
        $superAdmin->setRoles(array('ROLE_SUPER_ADMIN', 'ROLE_ADMIN','ROLE_USER'));
        $superAdmin->setPassword($this->passwordEncoder->encodePassword( $superAdmin,'admin'));
        $manager->persist($superAdmin);

        $admin = new User();
        $admin->setPrenom("John");
        $admin->setNom("Doe");
        $admin->setEmail("admin@gmail.com");
        $admin->setRoles(array('ROLE_ADMIN','ROLE_USER'));
        $admin->setPassword($this->passwordEncoder->encodePassword( $admin,'admin'));
        $manager->persist($admin);

        $user = new User();
        $user->setPrenom("John");
        $user->setNom("Doe");
        $user->setEmail("test@gmail.com");
        $user->setRoles(array('ROLE_USER'));
        $user->setPassword($this->passwordEncoder->encodePassword( $user,'admin'));
        $manager->persist($user);

        $manager->flush();

    }
}
