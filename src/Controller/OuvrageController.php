<?php

namespace App\Controller;

use App\Entity\Abonnement;
use App\Entity\Chapitre;
use App\Entity\Ouvrage;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OuvrageController extends AbstractController
{
    /**
     * @Route("/ouvrage/show/{id}", name="app_ouvrages_show", methods={"GET"}))
     */
    public function show(Ouvrage $ouvrage): Response
    {
        if(!$this->getUser()){
            $this->addFlash('error', 'Vous devez vous connecter !.');

            return $this->redirectToRoute('app_home');
        }

        return $this->render('ouvrage/show.html.twig', compact('ouvrage'));
    }

    /**
     * @Route("/ouvrage/{id}", name="app_ouvrage", methods={"GET"}))
     */
    public function index(Ouvrage $ouvrage, EntityManagerInterface $entityManager): Response
    {
        if(!$this->getUser()){
            $this->addFlash('error', 'Vous devez vous connecter !.');

            return $this->redirectToRoute('app_home');
        }

        $abonnement = $entityManager->getRepository(Abonnement::class)->findOneBy(['ouvrage' => $ouvrage->getId(), 'user' => $this->getUser()]);

        if($abonnement){

            return $this->render('ouvrage/index.html.twig', ['ouvrage' => $ouvrage, 'user' => $this->getUser()]);
        }

        $this->addFlash('error', 'Vous devez être abonné !.');

        return $this->redirectToRoute('app_ouvrages_show',['id' => $ouvrage->getId()]);

    }
}
