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
            TextField::new('nomPersonne'),
            TextField::new('prenomPersonne'),
            DateTimeField::new('dateCreation'),
            DateTimeField::new('dateModification'),
            AssociationField::new('actionnaire'),
            AssociationField::new('fonction'),

           
        ];
    }
    
}
