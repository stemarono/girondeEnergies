<?php

namespace App\Controller\Admin;

use App\Entity\RapportActivite;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class RapportActiviteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return RapportActivite::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
           
            TextField::new('rapport'),
            DateTimeField::new('dateCreation'),
            DateTimeField::new('dateModification'),
        ];
    }
    
}
