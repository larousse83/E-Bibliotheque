<?php

namespace App\Controller\Admin;

use App\Entity\Ouvrage;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class OuvrageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Ouvrage::class;
    }

    public function configureFields(string $pageName): iterable
    {

        switch ($pageName){
            case Crud::PAGE_NEW:
            case Crud::PAGE_EDIT:
            return [
                TextField::new('titre'),
                TextField::new('auteur'),
                TextareaField::new('imageFile','couverture')->setFormType(VichImageType::class)
            ];
            default:
                return [
                    TextField::new('titre'),
                    TextField::new('auteur'),
                    ImageField::new('couverture','couverture')->setBasePath('/uploads/ouvrages')
                ];
        }

    }
}
