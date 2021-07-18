<?php

namespace App\Controller\Admin;

use App\Entity\Game;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

class GameCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Game::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('title'),
            TextEditorField::new('contenu'),
            ImageField::new('image')->setUploadDir("public/assets/blog/images")
                ->setBasePath("/assets/blog/images"),
            DateTimeField::new('dateEnd'),
            DateTimeField::new('dateEndParticipation'),
            TextField::new('gift'),
            ImageField::new('qr')->setUploadDir("public/assets/blog/images")
                ->setBasePath("/assets/blog/images"),

        ];
    }
}
