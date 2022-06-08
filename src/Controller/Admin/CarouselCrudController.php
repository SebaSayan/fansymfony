<?php

namespace App\Controller\Admin;

use App\Entity\Carousel;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CarouselCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Carousel::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name')->setLabel('Nom'),
            TextField::new('subtitle')->setLabel('Titre'),
            TextareaField::new('description')->setLabel('Description'),
            TextField::new('image')->setLabel('Image'),
            TextField::new('size')->setLabel('Taille ecran'),
            TextField::new('extention')->setLabel('Extention'),
            BooleanField::new('active')->renderAsSwitch(false),
        ];
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