<?php

namespace App\Controller;

use App\Entity\Abonnement;
use App\Entity\Ressource;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Vich\UploaderBundle\Form\Type\VichFileType;

class RessourceController extends AbstractController
{
    /**
     * @Route("/ressource/{id}", name="app_ressource")
     */
    public function index(Ressource $ressource, EntityManagerInterface $entityManager): Response
    {
        if(!$this->getUser()){
            $this->addFlash('error', 'Vous devez vous connecter !.');

            return $this->redirectToRoute('app_home');
        }
        $abonnement = $entityManager->getRepository(Abonnement::class)->findOneBy(['ouvrage' => $ressource->getOuvrage(), 'user' => $this->getUser()]);

        if($abonnement){

            return $this->render('ressource/index.html.twig', compact('ressource'));
        }

        $this->addFlash('error', 'Vous devez être abonné !.');

        return $this->redirectToRoute('app_ouvrages_show', ['id' => $ressource->getOuvrage()->getId()]);

    }
}
