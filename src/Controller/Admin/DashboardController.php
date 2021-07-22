<?php

namespace App\Controller\Admin;

use App\Entity\Admin;
use App\Entity\CategorieProduit;
use App\Entity\Commande;
use App\Entity\Employe;
use App\Entity\Fournisseur;
use App\Entity\Produit;
use App\Entity\Utilisateur;
use App\Entity\ProduitCommander;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\UserMenu;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        // return parent::index();
        //redirection vers page utilisateur du CRUD
        $routeBuilder = $this->get(CrudUrlGenerator::class)->build();
        $url = $routeBuilder->setController(UtilisateurCrudController::class)->generateUrl();
        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Hephaestos');
    }

    public function configureCrud(): Crud
    {
        return Crud::new()
        ->setPaginatorPageSize(10)// the max number of entities to display per page
        ->setPaginatorRangeSize(5)// the paginator displays: [Previous]  1 ... [3 ]... 5 [Next]
        ->setSearchFields(['nom','prenom','ville','cp']); //name of entities properties to seach in
    }

    public function configureMenuItems(): iterable
    {
        // yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
        yield MenuItem::linkToRoute('Back to Website','fas fa-home','homepage');
        yield MenuItem::section('Utilisateur');
        yield MenuItem::linkToCrud('Panneau Admin', 'fas fa-user', Admin::class)   
            ->setPermission('ROLE_SUPER_ADMIN');
        yield MenuItem::linkToCrud('Utilisateur', 'fas fa-address-card', Utilisateur::class);
        yield MenuItem::linkToCrud('Employe', 'fas fa-id-badge', Employe::class);
        yield MenuItem::section('Commande');
        yield MenuItem::linkToCrud('Commande', 'fas fa-receipt', Commande::class);
        yield MenuItem::linkToCrud('Produit Commander', 'fas fa-archive', ProduitCommander::class);
        yield MenuItem::section('Produit');
        yield MenuItem::linkToCrud('Produit', 'fas fa-shopping-basket', Produit::class);
        yield MenuItem::linkToCrud('Catégorie Produit', 'fas fa-boxes', CategorieProduit::class);
        yield MenuItem::linkToCrud('Fournisseur', 'fas fa-shipping-fast', Fournisseur::class);
        
    }

    public function configureUserMenu(UserInterface $user): UserMenu
    {
        return parent::configureUserMenu($user)
        // use the given $user object to get the user name
        ->setName($user->getUsername());
    }
}
