<?php

namespace App\Controller\Admin;

use App\Entity\Message;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

class MessageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Message::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [

            IntegerField::new('Id')->setLabel('Identifiant'),
            TextField::new('Name')->setLabel('Nom'),
            EmailField::new('Email')->setLabel('Em@il'),
            TextField::new('Subject')->setLabel('Sujet'),
            TextareaField::new('Content')->setLabel('Message'),
            DateTimeField::new('CreatedAt')->setLabel('Date Heure'),
            BooleanField::new('Answered')->setLabel('Répondu'),

        ];
    }
}