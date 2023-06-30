<?php

namespace App\Controller\Admin;

use App\Entity\Actionnaire;
use App\Entity\Activite;
use App\Entity\Actualite;
use App\Entity\Commune;
use App\Entity\Contact;
use App\Entity\Filiale;
use App\Entity\Fonction;
use App\Entity\Menu;
use App\Entity\Page;
use App\Entity\Personne;
use App\Entity\Precommande;
use App\Entity\RapportActivite;
use App\Entity\TypeActivite;
use App\Entity\Utilisateur;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
         $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(PageCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Gironde Energies');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Tableau de bord', 'fa fa-home');

        yield MenuItem::linkToCrud('Pages', 'fa-brands fa-pagelines', Page::class);
        yield MenuItem::linkToCrud('Menu',"fa-regular fa-file-lines", Menu::class);
        yield MenuItem::linkToCrud('Commune',"fa-solid fa-house", Commune::class);
        yield MenuItem::linkToCrud('Type Activité',"fa-solid fa-solar-panel", TypeActivite::class);
        yield MenuItem::linkToCrud('Activité',"fa-solid fa-charging-station", Activite::class);
        yield MenuItem::linkToCrud('Pré-Commande',"fa-regular fa-handshake", Precommande::class);
        yield MenuItem::linkToCrud('Actionnaire',"fa-solid fa-people-group", Actionnaire::class);
        yield MenuItem::linkToCrud('Fonction',"fa-solid fa-sitemap", Fonction::class);
        yield MenuItem::linkToCrud('Personnes',"fa-solid fa-users", Personne::class);
        yield MenuItem::linkToCrud('Utilisateur',"fa-solid fa-user", Utilisateur::class);
        yield MenuItem::linkToCrud('Actualité',"fa-solid fa-newspaper", Actualite::class);
        yield MenuItem::linkToCrud('Rapports d\'Activité',"fa-solid fa-file", RapportActivite::class);
        yield MenuItem::linkToCrud('Contact',"fa-solid fa-address-book", Contact::class);
        yield MenuItem::linkToCrud('Filiales',"fa-solid fa-chart-line", Filiale::class);



       
    }
}
