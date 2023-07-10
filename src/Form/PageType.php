<?php

namespace App\Form;

use App\Entity\Menu;
use App\Entity\Page;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre',TextType::class,[
                'label'=>'contenu',
                'attr'=>['class'=>'form-control'],
            ])
            ->add('contenu',TextareaType::class,[
                'label'=>'contenu',
                'attr'=>['class'=>'form-control']
            ])
            ->add('slug',TextType::class,[
                'label'=>'slug',
                'attr'=>['class'=>'form-control']
            ])
            ->add('datePublication',DateType::class,[
                'label'=>'date de Publication',
                'attr'=>['class'=>'form-control']
            ])
            ->add('dateCreation', DateType::class,[
                'label'=>'date de création',
                'attr'=>['class'=>'form-control'],
            ])
            ->add('dateModification',DateType::class,[
                'label'=>'date de modification',
                'attr'=>['class'=>'form-control'],
            ])
            ->add('menu',EntityType::class,[
                'class'=>Menu::class,
                'label'=>'menu',
                'attr'=>['class'=>'form-control'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Page::class,
        ]);
    }
}
