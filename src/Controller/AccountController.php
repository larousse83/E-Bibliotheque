<?php

namespace App\Controller;

use App\Repository\AbonnementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccountController extends AbstractController
{
    /**
     * @Route("/account", name="app_account", methods={"GET"})
     */
    public function index(AbonnementRepository $repo): Response
    {
        if(!$this->getUser()){
            $this->addFlash('error', 'Vous devez vous connecter !.');

            return $this->redirectToRoute('app_home');
        }
        $abonnements =  $repo->findBy(['user' => $this->getUser()]);

        return $this->render('account/index.html.twig', ['abonnements' => $abonnements]);
    }
}
