<?php

namespace App\DataFixtures;

use App\Entity\Recette;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RecetteFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 10; $i++) {
            $recette = new Recette();
            // créer un hydrate!!!
            $recette->setTitre("pizza" );
            $recette->setDureePreparation("25min" );
            $recette->setTempsCuisson("15min" );
            $recette->setNbPersonne("2" );
            $recette->setPhoto("2.png" );
            $recette->setDescription("Description, description, description" );

            $manager->persist($recette);
        }
           
           
          
        $manager->flush();
    }
}
