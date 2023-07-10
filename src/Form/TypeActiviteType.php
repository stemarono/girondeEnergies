<?php

namespace App\Form;

use App\Entity\TypeActivite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TypeActiviteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('typeactivite',TextType::class,[
                'label'=>'type d\'activité',
                'attr'=>['class'=>'form-control']
            ])
            ->add('descriptionTypeActivite',TextareaType::class,[
                'label'=>'description',
                'attr'=>['class'=>'form-control'],
            ])
            ->add('dateCreation',DateType::class,[
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
            'data_class' => TypeActivite::class,
        ]);
    }
}
