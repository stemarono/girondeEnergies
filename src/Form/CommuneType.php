<?php

namespace App\Form;

use App\Entity\Commune;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommuneType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomCommune', TextType::class,[
                'label'=>'nom de la commune',
                'attr'=>['class'=>'form-control']
            ])
            ->add('dateCreation', DateType::class,[
                'label'=>'date de création',
                'attr'=>['class'=>'form-control']
            ])
            ->add('dateModification',DateType::class,[
                'label'=>'date de modification',
                'attr'=>['class'=>'form-control']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Commune::class,
        ]);
    }
}
