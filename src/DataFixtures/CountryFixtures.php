<?php

namespace App\DataFixtures;

use App\Entity\Country;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CountryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $country1 = new Country();
        $country1->setName('France');
        $manager->persist($country1);

        $country2 = new Country();
        $country2->setName('Italie');
        $manager->persist($country2);

        $country3 = new Country();
        $country3->setName('Allemagne');
        $manager->persist($country3);

        $country4 = new Country();
        $country4->setName('Espagne');
        $manager->persist($country4);

        $country5 = new Country();
        $country5->setName('Royaume-Uni');
        $manager->persist($country5);

        $manager->flush();
    }
}
