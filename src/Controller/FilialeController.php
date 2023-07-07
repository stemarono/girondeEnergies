<?php

namespace App\Controller;

use App\Entity\Filiale;
use App\Form\FilialeType;
use App\Repository\FilialeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/filiale')]
class FilialeController extends AbstractController
{
    #[Route('/', name: 'app_filiale_index', methods: ['GET'])]
    public function index(FilialeRepository $filialeRepository): Response
    {
        return $this->render('filiale/index.html.twig', [
            'filiales' => $filialeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_filiale_new', methods: ['GET', 'POST'])]
    public function new(Request $request, FilialeRepository $filialeRepository): Response
    {
        $filiale = new Filiale();
        $form = $this->createForm(FilialeType::class, $filiale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $filialeRepository->save($filiale, true);

            return $this->redirectToRoute('app_filiale_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('filiale/new.html.twig', [
            'filiale' => $filiale,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_filiale_show', methods: ['GET'])]
    public function show(Filiale $filiale): Response
    {
        return $this->render('filiale/show.html.twig', [
            'filiale' => $filiale,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_filiale_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Filiale $filiale, FilialeRepository $filialeRepository): Response
    {
        $form = $this->createForm(FilialeType::class, $filiale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $filialeRepository->save($filiale, true);

            return $this->redirectToRoute('app_filiale_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('filiale/edit.html.twig', [
            'filiale' => $filiale,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_filiale_delete', methods: ['POST'])]
    public function delete(Request $request, Filiale $filiale, FilialeRepository $filialeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$filiale->getId(), $request->request->get('_token'))) {
            $filialeRepository->remove($filiale, true);
        }

        return $this->redirectToRoute('app_filiale_index', [], Response::HTTP_SEE_OTHER);
    }
}
