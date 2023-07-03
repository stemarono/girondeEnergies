<?php

namespace App\Controller\Admin;

use App\Entity\Filiale;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\PercentField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;

class FilialeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Filiale::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
           
            TextField::new('nomFiliale', 'nom de la filiale'),
            TextEditorField::new('description'),
            UrlField::new('logo'),
            PercentField::new('partCapital', 'part du capital'),
            DateTimeField::new('dateCreation','date de la création'),
            DateTimeField::new('dateModification', 'date de la modification'),
        ];
    }
    
}
