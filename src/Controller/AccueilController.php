<?php

namespace App\Controller;

use App\Entity\Actualite;
use App\Form\ActualiteType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function index(Request $request, EntityManagerInterface $em,$id=0): Response
    {
        $actualite=new Actualite();
        $actualite=$em->getRepository(Actualite::class)->findOneBy(['id'=>'desc']);

        $form=$this->createForm(ActualiteType::class,$actualite);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $image=$form->get('imageUrl')->getData();
            if($image){
                $fichier=$image->getClientOriginalName();
                $dossier='../public/upload';
                $move=$image->move($dossier,$fichier);
                if($move){
                    $actualite->setImageUrl($fichier);
                }
            }
            $em->persist($actualite);
            $em->flush();

            return $this->redirectToRoute('app_accueil');
        }

        return $this->render('accueil/index.html.twig', [
            'actualite' => $actualite,
        ]);
    }
}
