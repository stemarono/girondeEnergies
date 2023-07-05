<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request, EntityManagerInterface $em): Response
    {
        $contact=new Contact();

        $form=$this->createForm(ContactType::class,$contact);
        $form->handleRequest($request);

        if($form->isSubmitted() &&$form->isValid()){
            $em->persist($contact);
            $em->flush();
        
            return $this->redirectToRoute('app_contact');
        }
        return $this->render('contact/contact.html.twig', [
            'contact'=>$contact,
            'form'=>$form,
        ]);
    }
}
