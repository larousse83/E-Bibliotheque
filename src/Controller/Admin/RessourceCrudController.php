<?php

namespace App\Controller\Admin;

use App\Entity\Ressource;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Vich\UploaderBundle\Form\Type\VichFileType;

class RessourceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Ressource::class;
    }

    public function configureFields(string $pageName): iterable
    {
        switch ($pageName){
            case Crud::PAGE_NEW:
            case Crud::PAGE_EDIT:
                return [
                    TextField::new('titre'),
                    TextareaField::new('imageFile','vignette')->setFormType(VichImageType::class),
                    TextField::new('fichierFile','fichier')->setFormType(VichFileType::class),

                    AssociationField::new( 'ouvrage', 'Ouvrage' )->setCustomOption( "by_reference", false ),
                    AssociationField::new( 'chapitre', 'Chapitre' )->setCustomOption( "by_reference", false ),
                    AssociationField::new( 'section', 'Section' )->setCustomOption( "by_reference", false ),
                ];
            default:
                return [
                    TextField::new('titre'),
                    ImageField::new('vignette','vignette')->setBasePath('/medias/vignettes'),
                    ImageField::new('fichier','fichier')->setBasePath('/medias/ressource_fichier'),

                    AssociationField::new( 'ouvrage', 'Ouvrage' )->setCustomOption( "by_reference", false ),
                    AssociationField::new( 'chapitre', 'Chapitre' )->setCustomOption( "by_reference", false ),
                    AssociationField::new( 'section', 'Section' )->setCustomOption( "by_reference", false ),
                ];
        }

    }
}
