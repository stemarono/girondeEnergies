<?php

namespace App\Controller\Admin;

use App\Entity\Actionnaire;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ActionnaireCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Actionnaire::class;
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
