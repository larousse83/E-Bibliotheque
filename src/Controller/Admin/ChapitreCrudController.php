<?php

namespace App\Controller\Admin;

use App\Entity\Chapitre;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ChapitreCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Chapitre::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('titre'),
            AssociationField::new( 'ouvrage', 'ouvrage' )->setCustomOption( "by_reference", false ),
        ];
    }
}
