<?php

namespace App\Controller\Admin;

use App\Entity\Ouvrage;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('E Bibliotheque');
    }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::linkToDashboard('Home', 'fa fa-home'),

            MenuItem::section('Bibliothèque'),
            MenuItem::linkToCrud('Ouvrage', 'fa fa-tags', Ouvrage::class),

            MenuItem::section('Users'),
            MenuItem::linkToCrud('Users', 'fa fa-user', User::class),
        ];
    }
}
