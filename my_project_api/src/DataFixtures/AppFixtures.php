<?php

namespace App\DataFixtures;

use DateTime;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $p1 = new Product("P1", 100); //true
        $p1->setPublishedOn(new DateTime("1976-10-25"));
        $manager->persist($p1);

        $p2 = new Product("P2", 200, false);
        $p2->setPublishedOn(new DateTime("2003-11-25"));
        $manager->persist($p2);

        $manager->flush();
    }
}
