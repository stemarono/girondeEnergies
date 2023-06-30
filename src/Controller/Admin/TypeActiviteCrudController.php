<?php

namespace App\Controller\Admin;

use App\Entity\TypeActivite;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TypeActiviteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TypeActivite::class;
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
