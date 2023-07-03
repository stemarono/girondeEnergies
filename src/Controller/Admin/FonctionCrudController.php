<?php

namespace App\Controller\Admin;

use App\Entity\Fonction;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class FonctionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Fonction::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
           
            TextField::new('fonction'),
            DateTimeField::new('dateCreation','date de la création'),
            DateTimeField::new('dateModification', 'date de la modification'),
            
           
        ];
    }
    
}
