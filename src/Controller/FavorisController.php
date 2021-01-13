<?php

namespace App\Controller;

use App\Entity\ElementFavorisable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
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
     * @Route("/favoris/add/{id}", name="app_favoris_add", methods={"PUT"})
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
}
