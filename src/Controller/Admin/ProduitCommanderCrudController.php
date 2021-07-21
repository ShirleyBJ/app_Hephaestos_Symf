<?php

namespace App\Controller\Admin;

use App\Entity\ProduitCommander;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

class ProduitCommanderCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ProduitCommander::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IntegerField::new('quantite'),
            AssociationField::new('noCommande'),
            AssociationField::new('produit'),
        ];
    }
}
