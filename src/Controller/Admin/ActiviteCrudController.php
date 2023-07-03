<?php

namespace App\Controller\Admin;

use App\Entity\Activite;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;

class ActiviteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Activite::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            
            TextField::new('titreRealisation', 'titre de la réalisation'),
            TextEditorField::new('description'),
            BooleanField::new('enProjet', 'en projet'),
            integerField::new('typeActivite', 'type d\'activité'),
            integerField::new('commune','nom de la commune'),
            UrlField::new('imageUrl'),
            DateTimeField::new('dateCreation', 'date de création'),
            DateTimeField::new('dateModification','date de modification'),
        ];
    }
    
}
