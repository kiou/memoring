<?php

namespace App\Controller\Admin;

use App\Entity\Faq;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class FaqCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Faq::class;
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add('question')
        ;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Faq')
            ->setEntityLabelInPlural('Faq')
            ->setDefaultSort(['id' => 'DESC'])
            ->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig');
        ;
    }

    public function configureFields(string $pageName): iterable
    {
        $timestamp = time();

         yield TextField::new('question', 'Question');
         yield TextEditorField::new('contenu')
                    ->hideOnIndex()
                    ->setColumns('col-sm-12 col-lg-12 col-xxl-12')
                    ->setFormType(CKEditorType::class);
         yield BooleanField::new('isActive','Actif');
  
    }

}
