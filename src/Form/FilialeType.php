<?php

namespace App\Form;

use App\Entity\Filiale;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PercentType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FilialeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomFiliale',TextType::class,[
                'label'=>'nom de la Filiale',
                'attr'=>['class'=>'form-control'],
            ])
            ->add('description',TextareaType::class,[
                'label'=>'description',
                'attr'=>['class'=>'form-control'],
            ])
            ->add('logo',FileType::class,[
                'label'=>'logo',
                'attr'=>['class'=>'form-control'],
            ])
            ->add('partCapital',PercentType::class,[
                'label'=> 'part du capital',
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
            'data_class' => Filiale::class,
        ]);
    }
}
