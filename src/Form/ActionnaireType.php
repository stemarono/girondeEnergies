<?php

namespace App\Form;

use App\Entity\Actionnaire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ActionnaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomStructure',TextType::class,[
                'label'=>'nom de la structure',
                'attr'=>['class'=>'form ms-5 mt-5 mb-3']
            ])
            ->add('logo', FileType::class,[
                'label'=>'logo',
                'mapped'=>false,
                'required'=>false,
                'attr'=>['class'=>'form ms-5 my-3','onchange'=>'previewImage(this,"affiche_photo")'],
            ])
            ->add('dateCreation',DateType::class,[
                'label'=>'date de création',
                'attr'=>['class'=>'form my-3']
            ])
            ->add('dateModification',DateType::class,[
                'label'=>'date de modification',
                'attr'=>['class'=>'form my-3']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Actionnaire::class,
        ]);
    }
}
