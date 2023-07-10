<?php

namespace App\Form;

use App\Entity\Activite;
use App\Entity\Commune;
use App\Entity\TypeActivite;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ActiviteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titreRealisation',TextType::class,[
               'label'=>'titre de la réalisation',
               'attr'=>['class'=>'form-control']
            ])
            ->add('description',TextareaType::class,[
                'label'=>'description',
                'attr'=>['class'=>'form-control']
            ])
            ->add('enProjet', ChoiceType::class,[
                'choices'=>[
                    'Projet'=>true,
                    'Réalisation'=>false,
                ],
                'label'=> 'en projet',
                'attr'=>['class'=>'form-control']
            ])
            ->add('imageUrl',FileType::class,[
                'mapped'=>false,
                'required'=>false,
                'label'=>'photo',
                'attr'=>['class'=>'form-control','onchange'=>'previewImage(this,"affiche_photo")'],

            ])
            ->add('dateCreation', DateType::class,[
                'label'=>'date de création',
                'attr'=>['class'=>'form-control']
            ])
            ->add('dateModification',DateType::class,[
                'label'=>'date de modification',
                'attr'=>['class'=>'form-control']
            ])
            ->add('commune', EntityType::class,[
                'class'=>Commune::class,
                'label'=>'nom de la commune',
                'attr'=>['class'=>'form-control']
            ])
            ->add('typeActivite',EntityType::class,[
                'class'=>TypeActivite::class,
                'label'=>'type de l\'activité',
                'attr'=>['class'=>'form-control']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Activite::class,
        ]);
    }
}
