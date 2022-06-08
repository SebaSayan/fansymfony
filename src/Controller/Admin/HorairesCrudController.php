<?php

namespace App\Controller\Admin;

use App\Entity\Horaires;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class HorairesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Horaires::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('jour')->setLabel('Jour de la semaine'),
            TextField::new('ouverture')->setLabel('Heure d\'ouverture'),
            TextField::new('fermeture')->setLabel('Heure de fermeture'),
        ];
    }
}