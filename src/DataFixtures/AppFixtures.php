<?php

namespace App\DataFixtures;

use App\Entity\ProduitChimique;
use Cocur\Slugify\Slugify;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
class AppFixtures extends Fixture
{
      public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        for($i=0;$i<20;$i++) {
            $product = new ProduitChimique();
            $slugify=new Slugify();
        $formule=$faker->sentence();
        $masse_molaire=$faker->randomFloat();
        $conc_mol=$faker->randomFloat();
        $conc_mass=$faker->randomFloat();
        $masse=$faker->numberBetween(1,200);
        $volume=$faker->numberBetween(10,100);
        $duree=$faker->numberBetween(1,5);
        $quantite=$faker->numberBetween(1,10);
        $date_command=new \DateTime;
        $fournisseur=$faker->company;
        $name = $faker->name;
        $slug=$slugify->slugify($formule);

        $product->setFormule($formule)
                ->setMasseMolaire($masse_molaire)
                ->setConcentrationMolaire($conc_mol)
                ->setConcentrationMassique($conc_mass)
                ->setMasse($masse)
                ->setVolume($volume)
                ->setDureeConservation($duree)
                ->setQuantite($quantite)
                ->setDateCommande($date_command)
                ->setFournisseur($fournisseur)
            ->setName($name)
                ->setSlug($slug);


             $manager->persist($product);
        }
        $manager->flush();
    }
}
