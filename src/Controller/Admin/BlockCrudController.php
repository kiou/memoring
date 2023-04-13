<?php

namespace App\Controller\Admin;

use App\Entity\Block;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class BlockCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Block::class;
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
            ->setEntityLabelInSingular('Block')
            ->setEntityLabelInPlural('Blocks')
            ->setDefaultSort(['id' => 'DESC'])
            ->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig');
        ;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('title', 'Titre');
        yield TextEditorField::new('content')
            ->hideOnIndex()
            ->setFormType(CKEditorType::class);       
         yield ChoiceField::new('categorie')
            ->autocomplete()->setChoices([
                'Accueil' => 'Accueil'
        ]);
    }

}
