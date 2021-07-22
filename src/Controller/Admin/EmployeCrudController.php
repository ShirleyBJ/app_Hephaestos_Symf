<?php

namespace App\Controller\Admin;

use App\Entity\Employe;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class EmployeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Employe::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('civilite'),
            TextField::new('nom'),
            TextField::new('prenom'),
            TextField::new('adresse'),
            TextField::new('cp', 'CP'),
            TextField::new('ville'),
            TelephoneField::new('telephone'),
            EmailField::new('email'),
            TextField::new('motDePasse'),
            DateField::new('dateNaissance'),
            TextField::new('fonction'),
            DateField::new('dateEmbauche'),
            DateField::new('dateFinContrat')->hideOnIndex(),
        ];
    }
    
}
