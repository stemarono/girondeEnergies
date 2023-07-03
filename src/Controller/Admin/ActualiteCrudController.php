<?php

namespace App\Controller\Admin;

use App\Entity\Actualite;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;

class ActualiteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Actualite::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('titreActualite','titre de l\'actualité'),
            DateTimeField::new('dateActualite','date de l\'actualité'),
            TextEditorField::new('description'),
            UrlField::new('imageUrl'),
            DateTimeField::new('dateCreation','date de la Création'),
            DateTimeField::new('dateModification','date de la modification'),
        ];
    }
    
}
