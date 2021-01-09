<?php

namespace App\DataFixtures;

use App\Entity\Chapitre;
use App\Entity\Ouvrage;
use App\Entity\OuvrageCollection;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $collection = new OuvrageCollection();
        $collection->setTitre('collection 1');
        $manager->persist($collection);

        $collection2 = new OuvrageCollection();
        $collection2->setTitre('collection2');
        $manager->persist($collection2);

        $collection3 = new OuvrageCollection();
        $collection3->setTitre('collection3');
        $manager->persist($collection3);

        $ouvrage = new Ouvrage();
        $ouvrage->setOuvrageCollection($collection);
        $ouvrage->setTitre('Ouvrage 1');
        $ouvrage->setAuteur('Auteur 1');
        $ouvrage->setCouverture('photo1-5ff8c837ad0eb967821674.webp');
        $manager->persist($ouvrage);

        $ouvrage2 = new Ouvrage();
        $ouvrage2->setOuvrageCollection($collection2);
        $ouvrage2->setTitre('Ouvrage 2');
        $ouvrage2->setAuteur('Auteur 2');
        $ouvrage2->setCouverture('photo2-5ff8ca259983d786471507.webp');
        $manager->persist($ouvrage2);

        $ouvrage3 = new Ouvrage();
        $ouvrage3->setOuvrageCollection($collection3);
        $ouvrage3->setTitre('Ouvrage 3');
        $ouvrage3->setAuteur('Auteur 1');
        $ouvrage3->setCouverture('photo3-5ff8cb1479cae052871923.webp');
        $manager->persist($ouvrage3);

        $chapitre = new Chapitre();
        $chapitre->setTitre('Chapitre premier');
        $chapitre->setOuvrage($ouvrage3);
        $manager->persist($chapitre);

        $chapitre2 = new Chapitre();
        $chapitre2->setTitre('Chapitre second');
        $chapitre2->setOuvrage($ouvrage3);
        $manager->persist($chapitre2);

        $manager->flush();
    }
}
