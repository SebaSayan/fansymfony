<?php

namespace App\Controller\Admin;

use App\Entity\TarifsCoiffage;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TarifsCoiffageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TarifsCoiffage::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name')->setLabel('Nom du service'),
            TextareaField::new('description')->setLabel('Description'),
            BooleanField::new('from_to')->setLabel('A partir de'),
            MoneyField::new('price')->setCurrency('EUR')->setLabel('Prix'),
            MoneyField::new('price_max')->setCurrency('EUR')->setLabel('Prix Max'),
        ];
    }
}