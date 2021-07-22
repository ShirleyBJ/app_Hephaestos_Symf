<?php

namespace App\Controller\Admin;

use App\Entity\CategorieProduit;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\EntityFilter;

class CategorieProduitCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CategorieProduit::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('nom'),
            TextField::new('description'),
        ];
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add('description');
    }
}
