<?php

namespace App\DataFixtures;

use App\Entity\Mesures;
use App\Entity\ProduitChimique;
use Cocur\Slugify\Slugify;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
class MesuresFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        for($i=0;$i<20;$i++) {
           $mesure=new Mesures();
            $mesure->setBruit($faker->randomFloat(2,0,30))
            ->setHumidite($faker->randomFloat(2,0,30))
            ->setCo2($faker->randomFloat(2,0,30))
            ->setTemperatures($faker->randomFloat(2,0,30))
            ->setLuminosite($faker->randomFloat(2,0,30))
                ->setTime($faker->dateTime);

            $manager->persist($mesure);
        }
        $manager->flush();
    }
}
