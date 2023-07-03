<?php

namespace App\Controller\Admin;

use App\Entity\Personne;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PersonneCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Personne::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nomPersonne','nom de la personne'),
            TextField::new('prenomPersonne', 'prénom de la personne'),
            DateTimeField::new('dateCreation','date de création'),
            DateTimeField::new('dateModification','date de modification'),
            AssociationField::new('actionnaire'),
            AssociationField::new('fonction'),

           
        ];
    }
    
}
