<?php

namespace App\DataFixtures;

use Faker;

use App\Entity\Actor;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ActorFixtures extends Fixture implements DependentFixtureInterface
{
    const ACTORS = [
        'Andrew-Lincoln',
        'Norman-Reedus',
        'Lauren-Cohan',
        'Steven Yeun',
        'Danai-Gurira',
        'Jeffrey Dean Morgan',
        'Delaney Olson',
        'Mason Ziemann',
        'Dylan Fritsch',
        'Dr. Waylon Block II',
        'Rowena Dickens',
        'Prof. Jasmin Tillman Sr.',
        'Jenifer Braun',
        'Vivianne Hilpert',
        'Jany Bradtke',
        'Amaya Gerlach IV',
        'Mr. Esteban Mueller III',
        'Otho Koelpin',
        'Dr. Carson Roob Sr.',
        'Ms. Melisa Roberts II',
        'Clotilde Paucek',
        'Dr. Bill Lubowitz III',
        'Mr. Coty Frami',
        'Joe Reichert',
        'Ms. Elinore Lehner DDS',
        'Sonya Ryan',
        'Jordyn Osinski Jr.',
        'Pauline Osinski IV',
        'Rebeca Walker',
        'Dr. Chelsey Funk II',
        'Kathlyn Quigley Jr.',
        'Prof. Tod West',
        'Dr. Corine Stiedemann',
        'Dr. Lindsey Schuster PhD',
        'Emie Brekke',
        'Wallace Johnson',
        'Jody Daniel',
        'Stacy Smitham',
        'Mr. Favian Dickens IV',
        'April Welch II',
        'Destinee Berge MD',
        'Rafael Windler I',
        'Karli Schiller',
        'Prudence Satterfield MD',
        'Peyton Carter IV',
        'Antonina Runolfsson',
        'Luna Wehner',
        'Ms. Beulah Fisher',
        'Norval Rippin',
        'Mrs. Susan Kohler',
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::ACTORS as $key => $actorName) {  
            $actor = new Actor();
            
            $actor->setName($actorName);
            for ($i = 0; $i <= 5; $i++){
                $actor->addProgram($this->getReference('program_' . rand(1,5), $actor));
            }
            $manager->persist($actor);
            $this->setReference('actor_' . $key, $actor);
        }  

        $faker = Faker\Factory::create('en_US');

        for($i = 0; $i <= 50; $i++) {
            $actor = new Actor();
            $actor->setName($faker->name());
            $actor->addProgram($this->getReference('program_' . rand(1, 5), $actor));
            $manager->persist($actor);
        }

        $manager->flush();
    }

    public function getDependencies()  
    {
        return [ProgramFixtures::class];
    }
}
