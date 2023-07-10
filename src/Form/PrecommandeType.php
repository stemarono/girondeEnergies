<?php

namespace App\Form;

use App\Entity\Precommande;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PrecommandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('commune',EntityType::class,[
                'label'=>'nom de la commune',
                'attr'=>['class'=>'form-control'],
            ])
            ->add('ActiviteType',EntityType::class,[
                'label'=>'Type d\'activité',
                'attr'=>['class'=>'form-control'],
            ])
            ->add('nomStructure',TextType::class,[
                'label'=>'nom de la Structure',
                'attr'=>['class'=>'form-control'],
            ])
            ->add('nomDemandeur',TextType::class,[
                'label'=>'nom du demandeur',
                'attr'=>['class'=>'form-control'],
            ])
            ->add('prenomDemandeur',TextType::class,[
                'label'=>'prénom du demandeur',
                'attr'=>['class'=>'form-control'],
            ])
            ->add('emailDemandeur',EmailType::class,[
                'label'=>'adresse mail',
                'attr'=>['class'=>'form-control'],
            ])
            ->add('telephoneDemandeur',NumberType::class,[
                'label'=>'Téléphone du demandeur',
                'attr'=>['class'=>'form-control'],
            ])
            ->add('description',TextareaType::class,[
                'label'=>'description',
                'attr'=>['class'=>'form-control'],
            ])
            ->add('localisation',TextType::class,[
                'label'=>'localisation',
                'attr'=>['class'=>'form-control'],
            ])
            ->add('dateCreation',DateType::class,[
                'label'=>'date de création',
                'attr'=>['class'=>'form-control'],
                ])
            ->add('dateModification',DateType::class,[
                'label'=>'date de modification',
                'attr'=>['class'=>'form-control'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Precommande::class,
        ]);
    }
}
