<?php

namespace App\Controller;

use App\Entity\Abonnement;
use App\Entity\Section;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SectionController extends AbstractController
{
    /**
     * @Route("/section/{id}", name="app_section")
     */
    public function index(Section $section, EntityManagerInterface $entityManager): Response
    {
        if(!$this->getUser()){
            $this->addFlash('error', 'Vous devez vous connecter !.');

            return $this->redirectToRoute('app_home');
        }
        $abonnement = $entityManager->getRepository(Abonnement::class)->findOneBy(['ouvrage' => $section->getChapitre()->getOuvrage(), 'user' => $this->getUser()]);

        if($abonnement){

            return $this->render('section/index.html.twig', compact('section'));
        }

        $this->addFlash('error', 'Vous devez être abonné !.');

        return $this->redirectToRoute('app_ouvrages_show', ['id' => $section->getChapitre()->getOuvrage()->getId()]);

    }
}
