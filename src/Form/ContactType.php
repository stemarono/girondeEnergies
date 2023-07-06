<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomContact', TextType::class,[
                'label'=>" Nom :",
                'label_attr'=>['class'=>'mb-2'],
                'attr'=>['class'=>' formulaire form-control mb-4 w-75']
            ])
            ->add('prenomContact',TextType::class,[
                'label'=>'Prénom :',
                'label_attr'=>['class'=>'mb-2'],
                'attr'=>['class'=>'form-control mb-4 w-75']
            ])
            ->add('message',TextareaType::class,[
                'label'=>'Message:',
                'label_attr'=>['class'=>'mb-2'],
                'attr'=>['class'=>'form-control mb-4 w-75']
            ])
            ->add('email',EmailType::class,[
                'label'=>'Adresse mail :',
                'label_attr'=>['class'=>'mb-2'],
                'attr'=>['class'=>'form-control mb-4 w-75']
            ])
            ->add('dateCreation', HiddenType::class,[
                'attr'=>['class'=>'form-control'],
                'required'=>false,
                'mapped'=>false
            ])
            ->add('dateModification',HiddenType::class,[
                'attr'=>['class'=>'form-control',
                'required'=>false,
                'mapped'=>false
            ],
            
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
