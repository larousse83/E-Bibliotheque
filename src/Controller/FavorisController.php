<?php

namespace App\Controller;

use App\Entity\Chapitre;
use App\Entity\ElementFavorisable;
use App\Entity\Ressource;
use App\Entity\Section;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FavorisController extends AbstractController
{
    /**
     * @Route("/favoris/remove/{id}", name="app_favoris_remove", methods={"DELETE"})
     * @param Request $request
     * @return JsonResponse
     */
    public function remove(Request $request, EntityManagerInterface $manager) : JsonResponse
    {
        if($request->isXmlHttpRequest()){
            $id = $request->get('id');
            $favoris = $manager->getRepository(ElementFavorisable::class)->findOneBy(['id' => $id]);
            $favoris->removeUser($this->getUser());
            $manager->persist($favoris);
            $manager->flush();

            return new JsonResponse('ok', 200);
        }
        return new JsonResponse("Ce n'est pas de l'ajax", 400);

    }

    /**
     * @Route("/favoris/add/{id}", name="app_favoris_add", methods={"POST","PUT"})
     * @param Request $request
     * @return JsonResponse
     */
    public function add(Request $request, EntityManagerInterface $manager) : JsonResponse
    {
        if($request->isXmlHttpRequest()){
            $id = $request->get('id');
            $favoris = $manager->getRepository(ElementFavorisable::class)->findOneBy(['id' => $id]);
            $favoris->addUser($this->getUser());
            $manager->persist($favoris);
            $manager->flush();

            return new JsonResponse('ok', 200);
        }
        return new JsonResponse("Ce n'est pas de l'ajax", 400);
    }

    /**
     * @Route("/favoris/{id}", name="app_favoris")
     */
    public function show(ElementFavorisable $favoris, EntityManagerInterface $em): Response
    {
        if(!$this->getUser()){
            $this->addFlash('error', 'Vous devez vous connecter !.');

            return $this->redirectToRoute('app_home');
        }

        if(!$favoris->getUsers()->contains($this->getUser())){
            $this->addFlash('error', 'Vous ajouter cette selection à vos favoris pour la consulter !.');
            return $this->redirectToRoute('app_account');
        }

        $chapitre = $em->getRepository(Chapitre::class)->findOneBy(['id' => $favoris->getId()]);
        $section = $em->getRepository(Section::class)->findOneBy(['id' => $favoris->getId()]);
        $ressource = $em->getRepository(Ressource::class)->findOneBy(['id' => $favoris->getId()]);

        if($chapitre){
            return $this->render('chapitre/show.html.twig', compact('chapitre'));
        }
        elseif($section){
            return $this->render('section/index.html.twig', compact('section'));
        }
        elseif($ressource){
            return $this->render('ressource/index.html.twig', compact('ressource'));
        }
    }
}
