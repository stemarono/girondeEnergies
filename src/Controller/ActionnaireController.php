<?php

namespace App\Controller;

use App\Entity\Actionnaire;
use App\Form\ActionnaireType;
use App\Repository\ActionnaireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/actionnaire')]
class ActionnaireController extends AbstractController
{
    #[Route('/', name: 'app_actionnaire_index', methods: ['GET'])]
    public function index(ActionnaireRepository $actionnaireRepository): Response
    {
        return $this->render('actionnaire/index.html.twig', [
            'actionnaires' => $actionnaireRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_actionnaire_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ActionnaireRepository $actionnaireRepository): Response
    {
        $actionnaire = new Actionnaire();
        $form = $this->createForm(ActionnaireType::class, $actionnaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) { 
            
            $image=$form->get('logo')->getData();
            if($image){
                $fichier=$image->getClientOriginalName();
                $dossier='../public/upload';
                $move=$image->move($dossier,$fichier);
                if($move){
                    $actionnaire->setLogo($fichier);
                }
            }
            $actionnaireRepository->save($actionnaire, true);

            return $this->redirectToRoute('app_actionnaire_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('actionnaire/new.html.twig', [
            'actionnaire' => $actionnaire,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_actionnaire_show', methods: ['GET'])]
    public function show(Actionnaire $actionnaire): Response
    {
        return $this->render('actionnaire/show.html.twig', [
            'actionnaire' => $actionnaire,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_actionnaire_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Actionnaire $actionnaire, ActionnaireRepository $actionnaireRepository): Response
    {
        $form = $this->createForm(ActionnaireType::class, $actionnaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $image=$form->get('logo')->getData();
            if($image){
                $fichier=$image->getClientOriginalName();
                $dossier='../public/upload';
                $move=$image->move($dossier,$fichier);
                if($move){
                    $actionnaire->setLogo($fichier);
                }
            }
            $actionnaireRepository->save($actionnaire, true);

            return $this->redirectToRoute('app_actionnaire_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('actionnaire/edit.html.twig', [
            'actionnaire' => $actionnaire,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_actionnaire_delete', methods: ['POST'])]
    public function delete(Request $request, Actionnaire $actionnaire, ActionnaireRepository $actionnaireRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$actionnaire->getId(), $request->request->get('_token'))) {
            $actionnaireRepository->remove($actionnaire, true);
        }

        return $this->redirectToRoute('app_actionnaire_index', [], Response::HTTP_SEE_OTHER);
    }
}
