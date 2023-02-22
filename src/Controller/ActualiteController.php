<?php
namespace App\Controller;

use App\Entity\Actualite;
use App\Repository\ActualiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ActualiteController extends AbstractController
{
    public function index(ActualiteRepository $ActualiteRepository)
    {
        $actualites = $ActualiteRepository->findBy(['isActive' => 1], ['id' => 'DESC']);

        $breadcrumb = array(
            'Accueil' => $this->generateUrl('app_index'),
            'Nos actualités' => ''
        );

        return $this->render('actualites.html.twig',[
            'breadcrumb' => $breadcrumb,
            'actualites' => $actualites
        ]);
    }


    public function view(Actualite $id, ActualiteRepository $ActualiteRepository)
    {
        $actualite = $ActualiteRepository->find($id);

        $breadcrumb = array(
            'Accueil' => $this->generateUrl('app_index'),
            'Les actualités' => $this->generateUrl('app_actualites'),
            $actualite->getTitre() => ''
        );

        return $this->render('actualite.html.twig',[
            'breadcrumb' => $breadcrumb,
            'actualite' => $actualite
        ]);

    }
}