<?php
namespace App\Controller;

use App\Entity\CarteQr;
use App\Repository\CarteQrRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CarteqrController extends AbstractController
{

    public function vieworange($idcarte, CarteQrRepository $CarteQrRepository)
    {
        $carte = $CarteQrRepository->findOrange($idcarte,'orange');

        $breadcrumb = array(
            'Accueil' => $this->generateUrl('app_index'),
            $carte->getTitre() => ''
        );

        return $this->render('carteqr.html.twig',[
            'breadcrumb' => $breadcrumb,
            'carte' => $carte
        ]);

    }

    public function viewbleu($idcarte, CarteQrRepository $CarteQrRepository)
    {
        $carte = $CarteQrRepository->findOrange($idcarte,'bleu');

        $breadcrumb = array(
            'Accueil' => $this->generateUrl('app_index'),
            $carte->getTitre() => ''
        );

        return $this->render('carteqr.html.twig',[
            'breadcrumb' => $breadcrumb,
            'carte' => $carte
        ]);

    }

    public function viewvert($idcarte, CarteQrRepository $CarteQrRepository)
    {
        $carte = $CarteQrRepository->findOrange($idcarte,'vert');

        $breadcrumb = array(
            'Accueil' => $this->generateUrl('app_index'),
            $carte->getTitre() => ''
        );

        return $this->render('carteqr.html.twig',[
            'breadcrumb' => $breadcrumb,
            'carte' => $carte
        ]);

    }
}