<?php

namespace App\DataFixtures;

use Faker;

use Doctrine\Bundle\FixturesBundle\Fixture;
use App\Entity\Season;
use App\DataFixtures\ProgramFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class SeasonFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('en_US');

        for($i = 0; $i <= 50; $i++) {
            $season = new Season();
            $season->setProgram($this->getReference('program_' . rand(0, 5)));
            $season->setNumber($faker->numberBetween($min=1, $max=10));
            $season->setYear($faker->year());
            $season->setDescription($faker->text());
            $this->addReference('season_' . $i, $season);
            $manager->persist($season);
        }
        $manager->flush();
    }


    public function getDependencies()  
    {
        return [ProgramFixtures::class];  
    }
}