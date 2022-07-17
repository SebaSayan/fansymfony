<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name')->setLabel('Nom du produit'),
            SlugField::new('slug')->setTargetFieldName('name')->setLabel('adresse du produit'),
            TextField::new('subtitle')->setLabel('Sous-titre'),
            TextareaField::new('description')->setLabel('Description'),
            ImageField::new('illustration')->setUploadDir('/public/assets/uploads/')->setLabel('Photo')->setBasePath('assets/uploads/')->setUploadedFileNamePattern('[randomhash].[extension]'),
            // BooleanField::new('from_to')->setLabel('A partir de'),
            MoneyField::new('price')->setCurrency('EUR')->setLabel('Prix'),
        ];
    }
}