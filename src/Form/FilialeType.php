<?php

namespace App\Form;

use App\Entity\Filiale;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FilialeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomFiliale')
            ->add('description')
            ->add('logo')
            ->add('partCapital')
            ->add('dateCreation')
            ->add('dateModification')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Filiale::class,
        ]);
    }
}
