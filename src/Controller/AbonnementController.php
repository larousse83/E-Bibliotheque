<?php

namespace App\Controller;

use App\Entity\Abonnement;
use App\Entity\Ouvrage;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AbonnementController extends AbstractController
{
    /**
     * @Route("/abonnement/{id}", name="app_abonnement", methods={"POST"})
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request, EntityManagerInterface $manager) : JsonResponse
    {
        if($request->isXmlHttpRequest()){
            $id = $request->get('id');
            $abonnement = new Abonnement();
            $abonnement->setOuvrage($manager->getRepository(Ouvrage::class)->findOneBy(['id' => $id]));
            $abonnement->setUser($this->getUser());
            $abonnement->setDateAbonnement(new \DateTimeImmutable);
            $abonnement->setDateLastRenouvellement(new \DateTimeImmutable);
            $manager->persist($abonnement);
            $manager->flush();
            $this->addFlash('success', 'Vous êtes abonnés !');

            return new JsonResponse('ok', 200);
        }
        return new JsonResponse("Ce n'est pas de l'ajax", 400);

    }
}
