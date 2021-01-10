<?php

namespace App\Controller;

use App\Entity\Chapitre;
use App\Entity\Ouvrage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OuvrageController extends AbstractController
{
    /**
     * @Route("/ouvrage/{id}", name="app_ouvrages_show", methods={"GET"}))
     */
    public function show(Ouvrage $ouvrage): Response
    {
        return $this->render('ouvrage/show.html.twig', compact('ouvrage'));
    }
}
