<?php

namespace App\Controller;

use App\Entity\Chapitre;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChapitreController extends AbstractController
{
    /**
     * @Route("/ouvrage/chapitre/{id}", name="app_chapitre_show")
     */
    public function index(Chapitre $chapitre): Response
    {
        return $this->render('chapitre/show.html.twig', compact('chapitre'));

    }
}
