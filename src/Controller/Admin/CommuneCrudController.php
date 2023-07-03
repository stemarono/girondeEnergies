<?php

namespace App\Controller\Admin;

use App\Entity\Commune;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;

class CommuneCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Commune::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nomCommune', 'nom de la commune'),
            DateTimeField::new('DateCreation','date de la création'),
            DateTimeField::new('dateModification', 'date de la modification'),
        ];
    }
    
}
