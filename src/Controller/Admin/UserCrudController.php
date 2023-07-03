<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
           
            TextField::new('nomUser','nom de l\'utilisateur'),
            TextField::new('prenomUser','prénom de l\'utilisateur'),
            EmailField::new('email','adresse mail'),
            textField::new('password','mot de passe'),
            BooleanField::new('isAdmin'),
            DateTimeField::new('dateCreation','date de création'),
            DateTimeField::new('dateModification','date de modification'),

        ];
    }
    
}
