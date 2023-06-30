<?php

namespace App\Controller\Admin;

use App\Entity\Precommande;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PrecommandeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Precommande::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
