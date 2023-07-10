<?php

namespace App\Form;

use App\Entity\RapportActivite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RapportActiviteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('rapport', FileType::class,[
                'label'=>'rapport d\'activité',
                'attr'=>['class'=>'form-control'],
            ])
            ->add('dateCreation',DateType::class,[
                'label'=>'date de création',
                'attr'=>['class'=>'form-control'],
            ])
            ->add('dateModification',DateType::class,[
                'label'=>'date de Modification',
                'attr'=>['class'=>'form-control'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => RapportActivite::class,
        ]);
    }
}
