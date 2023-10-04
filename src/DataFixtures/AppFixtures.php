<?php

namespace App\DataFixtures;

use App\Entity\Utilisateur;
use Faker\Generator;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use App\DataFixtures\UserPasswordHasherInterface;


class AppFixtures extends Fixture
{ 
    /**
         * @var Generator
         */
        private Generator $faker;

        private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
        {
            $this->faker = Factory::create('fr_FR');
            $this->hasher = $hasher;
        }

    public function load(ObjectManager $manager): void
    {
       
        
        for ($i = 1; $i <= 50; $i++) {
            $utilisateur = new Utilisateur();
            $utilisateur->setName($this->faker->word())
            ->setLastName("utilisateur")
            ->setEmail($this->faker->email())
            ->setPassword($this->hasher->hashPassword())
            ->setLevel(1)
            ->setPoints(123)
            ->setType(true);

            $hashPassword = $this->hasher->hashPassword(
                $utilisateur,
                'password'
            );

            $utilisateur->setPassword($hashPassword);

            $manager->persist($utilisateur);

        }
        
        $manager->flush();
    }
}
