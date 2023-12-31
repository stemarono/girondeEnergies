<?php

namespace App\Controller\Admin;

use App\Entity\Contact;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;

class ContactCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Contact::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nomContact', 'nom du contact'),
            TextEditorField::new('PrenomContact', 'prénom du contact'),
            TextEditorField::new('message'),
            EmailField::new('Email'),
            DateTimeField::new('dateCreation','date de la création'),
            DateTimeField::new('dateModification','date de la modification'),
        ];
    }
    
}
