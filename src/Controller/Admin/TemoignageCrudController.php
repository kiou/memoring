<?php

namespace App\Controller\Admin;

use App\Entity\Temoignage;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TemoignageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Temoignage::class;
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add('nom')
        ;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Témoignage')
            ->setEntityLabelInPlural('Témoignages')
            ->setDefaultSort(['id' => 'DESC'])
        ;
    }

    public function configureFields(string $pageName): iterable
    {
         yield TextField::new('nom', 'Nom complet');
         yield TextareaField::new('contenu', 'Contenu');
         yield BooleanField::new('isActive','Actif');
  
    }


}
