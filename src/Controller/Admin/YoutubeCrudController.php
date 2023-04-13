<?php

namespace App\Controller\Admin;

use App\Entity\Youtube;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class YoutubeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Youtube::class;
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add('title')
        ;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Vidéo')
            ->setEntityLabelInPlural('Vidéos')
            ->setDefaultSort(['id' => 'DESC'])
            ->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig')
        ;
    }

    public function configureFields(string $pageName): iterable
    {
         yield TextField::new('title', 'Titre');
         yield TextField::new('link', 'Lien');
         yield TextEditorField::new('contenu')
            ->hideOnIndex()
            ->setColumns('col-sm-12 col-lg-12 col-xxl-12')
            ->setFormType(CKEditorType::class);
         yield BooleanField::new('isActive','Actif');
  
    }
}
