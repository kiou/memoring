<?php

namespace App\Controller\Admin;

use App\Entity\Faq;
use App\Entity\User;
use App\Entity\Block;
use App\Entity\Youtube;
use App\Entity\Actualite;
use App\Entity\CarteQr;
use App\Entity\Partenaire;
use App\Entity\Temoignage;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\UserMenu;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use Symfony\Component\Security\Core\User\UserInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('Admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('<img src="../img/logomenu.png" style="max-width:95%;">')
            ->setFaviconPath('img/favicon.png');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::section('Gestion');
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-dot-circle', User::class)->setDefaultSort(['id' => 'DESC']);

        yield MenuItem::section('Contenu');
        yield MenuItem::linkToCrud('Blocks', 'fas fa-dot-circle', Block::class)->setDefaultSort(['id' => 'DESC']);
        yield MenuItem::linkToCrud('Youtube', 'fas fa-dot-circle', Youtube::class)->setDefaultSort(['id' => 'DESC']);
        yield MenuItem::linkToCrud('Actualités', 'fas fa-dot-circle', Actualite::class)->setDefaultSort(['id' => 'DESC']);
        yield MenuItem::linkToCrud('Partenaires', 'fas fa-dot-circle', Partenaire::class)->setDefaultSort(['id' => 'DESC']);
        yield MenuItem::linkToCrud('Témoignages', 'fas fa-dot-circle', Temoignage::class)->setDefaultSort(['id' => 'DESC']);
        yield MenuItem::linkToCrud('Faq', 'fas fa-dot-circle', Faq::class)->setDefaultSort(['id' => 'DESC']);

        yield MenuItem::section('Cartes');
        yield MenuItem::linkToCrud('QR codes', 'fas fa-dot-circle', CarteQr::class)->setDefaultSort(['id' => 'DESC']);

    }

    public function configureUserMenu(UserInterface $user): UserMenu
    {

        return parent::configureUserMenu($user)
            ->setGravatarEmail($user->getEmail())
            ->setName($user->getPrenom().' '.$user->getNom());
    }

    public function configureActions(): Actions
    {
        return parent::configureActions()
            ->add(Crud::PAGE_INDEX, Action::DETAIL);
    }
}
