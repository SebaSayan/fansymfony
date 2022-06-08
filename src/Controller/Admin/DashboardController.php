<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Event;
use App\Entity\Message;
use App\Entity\Product;
use App\Entity\Carousel;
use App\Entity\Horaires;
use App\Entity\TarifsHomme;
use App\Entity\TarifsEnfant;
use App\Entity\TarifsCoiffage;
use App\Entity\TarifsTechniques;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        //$routeBuilder = $this->get(AdminUrlGenerator::class);
        //return $this->redirect($routeBuilder->setController(OneOfYourCrudController::class)->generateUrl());
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Tableau de board');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToUrl('Retour au site', 'fas fa-cut', "/");
        yield MenuItem::linkToCrud('Carousel', 'fa fa-home', Carousel::class);
        /* yield MenuItem::linkToDashboard('Tableau de bord', 'fa fa-home');
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-users', User::class);
        yield MenuItem::linkToCrud('Horaires', 'fas fa-clock', Horaires::class);
        yield MenuItem::linkToCrud('Evenements', 'far fa-calendar', Event::class);
        yield MenuItem::linkToCrud('Tarifs Coiffage', 'fas fa-female', TarifsCoiffage::class);
        yield MenuItem::linkToCrud('Tarifs Techniques', 'fas fa-cut', TarifsTechniques::class);
        yield MenuItem::linkToCrud('Tarifs Homme', 'fas fa-male', TarifsHomme::class);
        yield MenuItem::linkToCrud('Tarifs Enfant', 'fas fa-child', TarifsEnfant::class);
        yield MenuItem::linkToCrud('Produits', 'fas fa-pump-soap', Product::class);
        yield MenuItem::linkToCrud('Messages', 'fas fa-envelope', Message::class)
     */
    }
}