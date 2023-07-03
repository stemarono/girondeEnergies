<?php

namespace App\Controller\Admin;

use App\Entity\Page;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Page::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
           
            TextField::new('titre'),
            TextEditorField::new('contenu'),
            SlugField::new('slug')->setTargetFieldName('slug'),
            AssociationField::new('menu')->autocomplete(),
            DateTimeField::new('datePublication','date de la publication'),
            DateTimeField::new('dateCreation','date de la création'),
            DateTimeField::new('dateModification','date de la modification'),
        ];
    }
    
}
