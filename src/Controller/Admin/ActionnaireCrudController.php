<?php

namespace App\Controller\Admin;

use App\Entity\Actionnaire;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;

class ActionnaireCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Actionnaire::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
           
            TextField::new('nomStructure', 'nom de la structure'),
            DateTimeField::new('dateCreation','date de création'),
            DateTimeField::new('dateModification','date de modification'),
        ];
    }
    
}
