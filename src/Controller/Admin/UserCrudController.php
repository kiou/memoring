<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add('prenom')
            ->add('nom')
            ->add('email')
        ;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Utilisateur')
            ->setEntityLabelInPlural('Utilisateurs')
            ->setDefaultSort(['id' => 'DESC'])
        ;
    }

 
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('prenom', 'Prènom'),
            TextField::new('nom'),
            EmailField::new('email'),
            TextField::new('password')->onlyWhenCreating()->setFormType(PasswordType::class),
            BooleanField::new('isActive','Actif'),
        ];
    }
 
}
