<?php

namespace App\Form;

use App\Entity\TypeActivite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TypeActiviteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('typeactivite')
            ->add('descriptionTypeActivite')
            ->add('dateCreation')
            ->add('dateModification')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TypeActivite::class,
        ]);
    }
}
