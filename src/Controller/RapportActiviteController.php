<?php

namespace App\Controller;

use App\Entity\RapportActivite;
use App\Form\RapportActiviteType;
use App\Repository\RapportActiviteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/rapport/activite')]
class RapportActiviteController extends AbstractController
{
    #[Route('/', name: 'app_rapport_activite_index', methods: ['GET'])]
    public function index(RapportActiviteRepository $rapportActiviteRepository): Response
    {
        return $this->render('rapport_activite/index.html.twig', [
            'rapport_activites' => $rapportActiviteRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_rapport_activite_new', methods: ['GET', 'POST'])]
    public function new(Request $request, RapportActiviteRepository $rapportActiviteRepository): Response
    {
        $rapportActivite = new RapportActivite();
        $form = $this->createForm(RapportActiviteType::class, $rapportActivite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $rapportActiviteRepository->save($rapportActivite, true);

            return $this->redirectToRoute('app_rapport_activite_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('rapport_activite/new.html.twig', [
            'rapport_activite' => $rapportActivite,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_rapport_activite_show', methods: ['GET'])]
    public function show(RapportActivite $rapportActivite): Response
    {
        return $this->render('rapport_activite/show.html.twig', [
            'rapport_activite' => $rapportActivite,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_rapport_activite_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, RapportActivite $rapportActivite, RapportActiviteRepository $rapportActiviteRepository): Response
    {
        $form = $this->createForm(RapportActiviteType::class, $rapportActivite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $rapportActiviteRepository->save($rapportActivite, true);

            return $this->redirectToRoute('app_rapport_activite_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('rapport_activite/edit.html.twig', [
            'rapport_activite' => $rapportActivite,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_rapport_activite_delete', methods: ['POST'])]
    public function delete(Request $request, RapportActivite $rapportActivite, RapportActiviteRepository $rapportActiviteRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$rapportActivite->getId(), $request->request->get('_token'))) {
            $rapportActiviteRepository->remove($rapportActivite, true);
        }

        return $this->redirectToRoute('app_rapport_activite_index', [], Response::HTTP_SEE_OTHER);
    }
}
