<?php

namespace App\Form;

use App\Entity\Actualite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ActualiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dateActualite',DateType::class,[
                'label'=>'date de l\'actualité',
                'attr'=>['class'=>'form-control'],

            ])
            ->add('titreActualite', TextType::class,[
                'label'=>'Titre de l\'actualité',
                'attr'=>['class'=>'form-control'],
            ])
            ->add('description', TextareaType::class, [
                'label'=>'description',
                'attr'=>['class'=>'form-control'],
            ])
            ->add('imageUrl', FileType::class,[
                'mapped'=>false,
                'required'=>false,
                'label'=>'image',
                'attr'=>['class'=>'form-control','onchange'=>'previewImage(this,"affiche_photo")']
            ])
            ->add('dateCreation',DateType::class,[
                'label'=>'date de création',
                'attr'=>['class'=>'form-control'],
            ])
            ->add('dateModification', Datetype::class,[
                'label'=>'date de modification',
                'attr'=>['class'=>'form-control'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Actualite::class,
        ]);
    }
}
