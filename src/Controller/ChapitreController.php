<?php

namespace App\Controller;

use App\Entity\Abonnement;
use App\Entity\Chapitre;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChapitreController extends AbstractController
{
    /**
     * @Route("/ouvrage/chapitre/{id}", name="app_chapitre_show")
     */
    public function index(Chapitre $chapitre, EntityManagerInterface $entityManager): Response
    {
        if(!$this->getUser()){
            $this->addFlash('error', 'Vous devez vous connecter !.');

            return $this->redirectToRoute('app_home');
        }

        $abonnement = $entityManager->getRepository(Abonnement::class)->findOneBy(['ouvrage' => $chapitre->getOuvrage(), 'user' => $this->getUser()]);

        if($abonnement){

            return $this->render('chapitre/show.html.twig', compact('chapitre'));
        }

        $this->addFlash('error', 'Vous devez être abonné !.');

        return $this->redirectToRoute('app_ouvrages_show', ['id' => $chapitre->getOuvrage()->getId()]);


    }
}
