<?php

namespace App\DataFixtures;

use App\Entity\OuvrageCollection;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use phpDocumentor\Reflection\Types\Collection;

class CollectionFixtures extends Fixture
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

        $manager->flush();
    }
}
