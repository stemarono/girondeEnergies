<?php

namespace App\Controller\Admin;

use App\Entity\RapportActivite;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class RapportActiviteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return RapportActivite::class;
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
