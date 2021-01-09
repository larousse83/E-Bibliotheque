<?php

namespace App\Controller\Admin;

use App\Entity\Ressource;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class RessourceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Ressource::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('titre'),
            AssociationField::new( 'ouvrage', 'Ouvrage' )->setCustomOption( "by_reference", false ),
            AssociationField::new( 'chapitre', 'Chapitre' )->setCustomOption( "by_reference", false ),
            AssociationField::new( 'section', 'Section' )->setCustomOption( "by_reference", false ),
        ];
    }
}
