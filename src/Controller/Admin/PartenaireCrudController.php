<?php

namespace App\Controller\Admin;

use Imagine\Image\Box;
use Imagine\Gd\Imagine;
use App\Utilities\Upload;
use App\Entity\Partenaire;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PartenaireCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Partenaire::class;
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add('titre')
        ;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Partenaire')
            ->setEntityLabelInPlural('Partenaires')
            ->setDefaultSort(['id' => 'DESC'])
        ;
    }

    public function configureFields(string $pageName): iterable
    {
        $timestamp = time();

         yield TextField::new('titre', 'Titre');
         yield ImageField::new('logo')
                    ->setUploadDir('public/img/upload/')
                    ->setBasePath('img/upload/')
                    ->setUploadedFileNamePattern('[slug]-'.$timestamp.'.[extension]')
                    ->setFormTypeOption('upload_new', function(UploadedFile $file) use ($timestamp){
                        $upload = new Upload();

                        $image = $upload->createName(
                            $file->getClientOriginalName(),
                            $this->getUploadRootDir().'/',
                            $timestamp
                        );

                        $imagine = new Imagine();

                        $size = new Box(1920,1080);
                        $imagine->open($file)
                                ->thumbnail($size, 'inset')
                                ->save($this->getUploadRootDir().'upload/'.$image);

                        $size = new Box(470,470);
                        $imagine->open($file)
                                ->thumbnail($size, 'inset')
                                ->save($this->getUploadRootDir().'miniature/'.$image);

                });
           yield ImageField::new('pdf','Fichier PDF')
                ->setUploadDir('public/file/upload/')
                ->setBasePath('file/upload/')
                ->setUploadedFileNamePattern('[slug]-'.$timestamp.'.[extension]')
                ->setTemplatePath('fields/fil.html.twig');
           yield BooleanField::new('isActive','Actif');
  
    }

    public function getUploadRootDir()
    {
        return __DIR__.'/../../../public/img/';
    }

}
