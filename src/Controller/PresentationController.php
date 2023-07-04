<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PresentationController extends AbstractController
{
    // #[Route('/presentation', name: 'app_presentation')]
    // public function index(): Response
    // {
    //     return $this->render('presentation/index.html.twig', [
    //         'controller_name' => 'PresentationController',
    //     ]);
    // }
    #[Route('/presentation/qui_sommes_nous', name: 'app_about')]
    public function about(): Response
    {
        return $this->render('presentation/about.html.twig',[
            'controller_name'=>'PresentationController',
        ]);
    }
}
