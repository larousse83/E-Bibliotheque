<?php

namespace App\DataFixtures;

use App\Entity\Chapitre;
use App\Entity\Ouvrage;
use App\Entity\OuvrageCollection;
use App\Entity\Ressource;
use App\Entity\Section;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $collection = new OuvrageCollection();
        $collection->setTitre('collection 1');
        $manager->persist($collection);

        $collectionOuvrage = new Ouvrage();
        $collectionOuvrage->setOuvrageCollection($collection);
        $collectionOuvrage->setTitre('Ouvrage 1');
        $collectionOuvrage->setAuteur('Auteur 1');
        $collectionOuvrage->setCouverture('photo1.webp');
        $manager->persist($collectionOuvrage);

        $collectionOuvragechapitre = new Chapitre();
        $collectionOuvragechapitre->setTitre('Chapitre premier');
        $collectionOuvragechapitre->setOuvrage($collectionOuvrage);
        $manager->persist($collectionOuvragechapitre);

        $collectionOuvragechapitreSection = new Section();
        $collectionOuvragechapitreSection->setTitre('section 1');
        $collectionOuvragechapitreSection->setChapitre($collectionOuvragechapitre);
        $manager->persist($collectionOuvragechapitreSection);

        $collectionOuvragechapitreSectionRessource = new Ressource();
        $collectionOuvragechapitreSectionRessource->setOuvrage($collectionOuvrage);
        $collectionOuvragechapitreSectionRessource->setChapitre($collectionOuvragechapitre);
        $collectionOuvragechapitreSectionRessource->setSection($collectionOuvragechapitreSection);
        $collectionOuvragechapitreSectionRessource->setTitre('sressource 1');
        $collectionOuvragechapitreSectionRessource->setFichier('cicZ.zip');
        $collectionOuvragechapitreSectionRessource->setVignette('photo3.webp');
        $manager->persist($collectionOuvragechapitreSectionRessource);

        $collectionOuvragechapitreSection2 = new Section();
        $collectionOuvragechapitreSection2->setTitre('section 1-a');
        $collectionOuvragechapitreSection2->setSection($collectionOuvragechapitreSection);
        $collectionOuvragechapitreSection2->setChapitre($collectionOuvragechapitre);
        $manager->persist($collectionOuvragechapitreSection2);

        $collectionOuvragechapitreSection3 = new Section();
        $collectionOuvragechapitreSection3->setTitre('section 2');
        $collectionOuvragechapitreSection3->setChapitre($collectionOuvragechapitre);
        $manager->persist($collectionOuvragechapitreSection3);

        $collectionOuvragechapitre2 = new Chapitre();
        $collectionOuvragechapitre2->setTitre('Chapitre second');
        $collectionOuvragechapitre2->setOuvrage($collectionOuvrage);
        $manager->persist($collectionOuvragechapitre2);

        $collectionOuvragechapitre2Section4 = new Section();
        $collectionOuvragechapitre2Section4->setTitre('section 1');
        $collectionOuvragechapitre2Section4->setChapitre($collectionOuvragechapitre2);
        $manager->persist($collectionOuvragechapitre2Section4);


        $collection2 = new OuvrageCollection();
        $collection2->setTitre('collection2');
        $manager->persist($collection2);

        $collectionOuvrage2 = new Ouvrage();
        $collectionOuvrage2->setOuvrageCollection($collection2);
        $collectionOuvrage2->setTitre('Ouvrage 2');
        $collectionOuvrage2->setAuteur('Auteur 2');
        $collectionOuvrage2->setCouverture('photo2.webp');
        $manager->persist($collectionOuvrage2);

        $collectionOuvrage2chapitre = new Chapitre();
        $collectionOuvrage2chapitre->setTitre('Chapitre premier');
        $collectionOuvrage2chapitre->setOuvrage($collectionOuvrage2);
        $manager->persist($collectionOuvrage2chapitre);

        $collectionOuvrage2chapitreSection = new Section();
        $collectionOuvrage2chapitreSection->setTitre('section 1');
        $collectionOuvrage2chapitreSection->setChapitre($collectionOuvrage2chapitre);
        $manager->persist($collectionOuvrage2chapitreSection);

        $collectionOuvrage2chapitreSection2 = new Section();
        $collectionOuvrage2chapitreSection2->setTitre('section 1-a');
        $collectionOuvrage2chapitreSection2->setSection($collectionOuvrage2chapitreSection);
        $collectionOuvrage2chapitreSection2->setChapitre($collectionOuvrage2chapitre);
        $manager->persist($collectionOuvrage2chapitreSection2);

        $collectionOuvrage2chapitreSection3 = new Section();
        $collectionOuvrage2chapitreSection3->setTitre('section 2');
        $collectionOuvrage2chapitreSection3->setChapitre($collectionOuvrage2chapitre);
        $manager->persist($collectionOuvrage2chapitreSection3);

        $collectionOuvrage2chapitre2 = new Chapitre();
        $collectionOuvrage2chapitre2->setTitre('Chapitre second');
        $collectionOuvrage2chapitre2->setOuvrage($collectionOuvrage2);
        $manager->persist($collectionOuvrage2chapitre2);

        $collectionOuvrage2chapitre2Section4 = new Section();
        $collectionOuvrage2chapitre2Section4->setTitre('section 1');
        $collectionOuvrage2chapitre2Section4->setChapitre($collectionOuvrage2chapitre2);
        $manager->persist($collectionOuvrage2chapitre2Section4);

        $collection3 = new OuvrageCollection();
        $collection3->setTitre('collection3');
        $manager->persist($collection3);

        $collectionOuvrage3 = new Ouvrage();
        $collectionOuvrage3->setOuvrageCollection($collection3);
        $collectionOuvrage3->setTitre('Ouvrage 3');
        $collectionOuvrage3->setAuteur('Auteur 1');
        $collectionOuvrage3->setCouverture('photo3.webp');
        $manager->persist($collectionOuvrage3);

        $collectionOuvrage3chapitre = new Chapitre();
        $collectionOuvrage3chapitre->setTitre('Chapitre premier');
        $collectionOuvrage3chapitre->setOuvrage($collectionOuvrage3);
        $manager->persist($collectionOuvrage3chapitre);

        $collectionOuvrage3chapitreSection = new Section();
        $collectionOuvrage3chapitreSection->setTitre('section 1');
        $collectionOuvrage3chapitreSection->setChapitre($collectionOuvrage3chapitre);
        $manager->persist($collectionOuvrage3chapitreSection);

        $collectionOuvrage3chapitreSection2 = new Section();
        $collectionOuvrage3chapitreSection2->setTitre('section 1-a');
        $collectionOuvrage3chapitreSection2->setSection($collectionOuvrage3chapitreSection);
        $collectionOuvrage3chapitreSection2->setChapitre($collectionOuvrage3chapitre);
        $manager->persist($collectionOuvrage3chapitreSection2);

        $collectionOuvrage3chapitreSection3 = new Section();
        $collectionOuvrage3chapitreSection3->setTitre('section 2');
        $collectionOuvrage3chapitreSection3->setChapitre($collectionOuvrage3chapitre);
        $manager->persist($collectionOuvrage3chapitreSection3);

        $collectionOuvrage3chapitre2 = new Chapitre();
        $collectionOuvrage3chapitre2->setTitre('Chapitre second');
        $collectionOuvrage3chapitre2->setOuvrage($collectionOuvrage3);
        $manager->persist($collectionOuvrage3chapitre2);

        $collectionOuvrage3chapitre2Section4 = new Section();
        $collectionOuvrage3chapitre2Section4->setTitre('section 1');
        $collectionOuvrage3chapitre2Section4->setChapitre($collectionOuvrage3chapitre2);
        $manager->persist($collectionOuvrage3chapitre2Section4);


        $manager->flush();
    }
}
