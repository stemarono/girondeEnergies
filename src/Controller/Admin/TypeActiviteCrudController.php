<?php

namespace App\Controller\Admin;

use App\Entity\TypeActivite;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TypeActiviteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TypeActivite::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            
            TextField::new('typeActivite'),
            TextEditorField::new('descriptionTypeActivite'),
            DateTimeField::new('dateCreation'),
            DateTimeField::new('dateModification'),
        ];
    }
    
}
