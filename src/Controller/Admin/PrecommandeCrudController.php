<?php

namespace App\Controller\Admin;

use App\Entity\Precommande;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PrecommandeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Precommande::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
           
            TextField::new('nomStructure','nom de la structure'),
            TextField::new('nomDemandeur', 'nom du demandeur'),
            TextField::new('prenomDemandeur', 'prénom du demandeur'),
            EmailField::new('EmailDemandeur','email du demandeur'),
            TelephoneField::new('telephoneDemandeur', 'telephone du demandeur' ),
            TextField::new('localisation'),
            TextEditorField::new('description'),
        ];
    }
    
}
