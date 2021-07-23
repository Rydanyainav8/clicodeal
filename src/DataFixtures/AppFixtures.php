<?php

namespace App\DataFixtures;

use App\Entity\Game;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);


        $faker = Faker\Factory::create();

        // $game = [];

        // for ($i = 0; $i < 15; $i++) {
        //     $game = new Game();
        //     $game->setTitle($faker->text(50));
        //     $game->setContenu($faker->text(300));
        //     $game->setImage($faker->imageUrl());
        //     $game->setCreatedAt(new \DateTime());
        //     $game->setDateEnd(new \DateTime());
        //     $game->setDateEndParticipation(new \DateTime());
        //     $game->setGift($faker->imageUrl());
        //     $game->setQr($faker->imageUrl());
        //     $manager->persist($game);
        // }

        $user = [];
        // for ($i = 0; $i < 15; $i++) {
        //     $user = new $User();
        //     $user->setUsername($faker->name());
        //     $user->setFirstname($faker->firstname());
        //     $user->setLastname($faker->lastName());
        //     $user->setSexe($faker->Person());
        //     $user->SetAge($faker->numberBetween(10, 50));
        //     $user->setPassword($faker->password());
        //     $user->setCreatedAt(new \DateTime());
        //     $manager->persist($user);
        //     $user[] = $user;
        // }


        $manager->flush();
    }
}
