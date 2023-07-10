<?php

namespace App\Form;

use App\Entity\Actionnaire;
use App\Entity\Fonction;
use App\Entity\Personne;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PersonneType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomPersonne',TextType::class,[
                'label'=>'nom de la personne',
                'attr'=>['class'=>'form-control'],
            ])
            ->add('prenomPersonne',TextType::class,[
                'label'=>'prénom de la personne',
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
            ->add('actionnaire',EntityTyp::class,[
                'class'=>Actionnaire::class,
                'label'=>'actionnaire',
                'attr'=>['class'=>'form-control']
            ])
            ->add('fonction',EntityType::class,[
                'class'=>Fonction::class,
                'label'=>'fonction',
                'attr'=>['class'=>'form-control']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Personne::class,
        ]);
    }
}
