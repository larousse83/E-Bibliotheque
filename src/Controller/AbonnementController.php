<?php

namespace App\Controller;

use App\Entity\Abonnement;
use App\Entity\Ouvrage;
use DateInterval;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AbonnementController extends AbstractController
{
    /**
     * @Route("/abonnement/{id}", name="app_abonnement", methods={"POST", "GET"})
     */
    public function add(Request $request, EntityManagerInterface $em): Response //, UserRepository $userRepo
    {
        $id = $request->get('id');

        $abonnement = $em->getRepository(Abonnement::class)->findOneBy(['ouvrage' => $id, 'user' => $this->getUser()]);

        if(!$abonnement){
            $abonnement = new Abonnement();
            $abonnement->setOuvrage($em->getRepository(Ouvrage::class)->findOneBy(['id' => $id]));
            $abonnement->setUser($this->getUser());
        }

        $abonnement->setDateAbonnement(new \DateTimeImmutable);
        $abonnement->setDateLastRenouvellement(new \DateTimeImmutable);

        $em->persist($abonnement);
        $em->flush();
        $this->addFlash('success', 'Vous êtes abonnés à cet ouvrage pendant un an !');
        return $this->redirectToRoute('app_ouvrage',['id' => $id]);


    }
}
