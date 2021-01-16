<?php

namespace App\Controller;

use App\Entity\Abonnement;
use App\Entity\Ouvrage;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccountController extends AbstractController
{
    /**
     * @Route("/account", name="app_account")
     */
    public function index(EntityManagerInterface $entityManager): Response
    {
        $abonnements =  $entityManager->getRepository(Abonnement::class)->findBy(['user' => $this->getUser()]);
        return $this->render('account/index.html.twig', ['abonnements' => $abonnements]);
    }
}
