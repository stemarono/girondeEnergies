<?php

namespace App\Controller;

use App\Entity\Precommande;
use App\Form\PrecommandeType;
use App\Repository\PrecommandeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/projet')]
class ProjetController extends AbstractController
{
    #[Route('/', name: 'app_projet_index', methods: ['GET'])]
    public function index(PrecommandeRepository $precommandeRepository): Response
    {
        return $this->render('projet/index.html.twig', [
            'precommandes' => $precommandeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_projet_new', methods: ['GET', 'POST'])]
    public function new(Request $request, PrecommandeRepository $precommandeRepository): Response
    {
        $precommande = new Precommande();
        $form = $this->createForm(PrecommandeType::class, $precommande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $precommandeRepository->save($precommande, true);

            return $this->redirectToRoute('app_projet_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('projet/new.html.twig', [
            'precommande' => $precommande,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_projet_show', methods: ['GET'])]
    public function show(Precommande $precommande): Response
    {
        return $this->render('projet/show.html.twig', [
            'precommande' => $precommande,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_projet_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Precommande $precommande, PrecommandeRepository $precommandeRepository): Response
    {
        $form = $this->createForm(PrecommandeType::class, $precommande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $precommandeRepository->save($precommande, true);

            return $this->redirectToRoute('app_projet_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('projet/edit.html.twig', [
            'precommande' => $precommande,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_projet_delete', methods: ['POST'])]
    public function delete(Request $request, Precommande $precommande, PrecommandeRepository $precommandeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$precommande->getId(), $request->request->get('_token'))) {
            $precommandeRepository->remove($precommande, true);
        }

        return $this->redirectToRoute('app_projet_index', [], Response::HTTP_SEE_OTHER);
    }
}
