<?php

namespace App\Controller\Admin;

use App\Entity\CarteQr;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CarteQrCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CarteQr::class;
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add('titre')
            ->add('couleur')
            ->add('idcarte')
        ;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Carte')
            ->setEntityLabelInPlural('Cartes QR')
            ->setDefaultSort(['id' => 'DESC'])
            ->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig');
        ;
    }


    public function configureFields(string $pageName): iterable
    {
         yield TextField::new('titre', 'Titre');
         yield ChoiceField::new('couleur')
                    ->autocomplete()->setChoices([
                        'orange' => 'orange',
                        'bleu' => 'bleu',
                        'vert' => 'vert'
                    ]);
         yield TextField::new('idcarte', 'Identifiant');
         yield TextEditorField::new('contenu')
                ->hideOnIndex()
                ->setColumns('col-sm-12 col-lg-12 col-xxl-12')
                ->setFormType(CKEditorType::class);
  
    }


}
