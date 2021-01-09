<?php

namespace App\DataFixtures;

use App\Entity\Ouvrage;
use App\Entity\OuvrageCollection;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class OuvrageFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $ouvrage = new Ouvrage();
        $ouvrage->setOuvrageCollection($manager->getRepository(OuvrageCollection::class)->findOneBy(["id" => "1"]));
        $ouvrage->setTitre('Ouvrage 1');
        $ouvrage->setAuteur('Auteur 1');
        $ouvrage->setCouverture('photo1-5ff8c837ad0eb967821674.webp');
        $manager->persist($ouvrage);

        $ouvrage2 = new Ouvrage();
        $ouvrage2->setOuvrageCollection($manager->getRepository(OuvrageCollection::class)->findOneBy(["id" => "1"]));
        $ouvrage2->setTitre('Ouvrage 2');
        $ouvrage2->setAuteur('Auteur 2');
        $ouvrage2->setCouverture('photo2-5ff8ca259983d786471507.webp');
        $manager->persist($ouvrage2);

        $ouvrage3 = new Ouvrage();
        $ouvrage3->setOuvrageCollection($manager->getRepository(OuvrageCollection::class)->findOneBy(["id" => "1"]));
        $ouvrage3->setTitre('Ouvrage 3');
        $ouvrage3->setAuteur('Auteur 1');
        $ouvrage3->setCouverture('photo3-5ff8cb1479cae052871923.webp');
        $manager->persist($ouvrage3);

        $manager->flush();
    }
}
