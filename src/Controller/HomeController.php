<?php

namespace App\Controller;

use App\Repository\OuvrageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_home", methods={"GET"}))
     */
    public function index(OuvrageRepository $repo): Response
    {
        $ouvrages= $repo->findBy([], ['createdAt' => 'DESC']);
        return $this->render('home/index.html.twig', compact('ouvrages'));
    }
}
