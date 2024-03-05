<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Event;
use App\Entity\Speaker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = \Faker\Factory::create('fr_FR'); // Initialisation de Faker
        // Tableau de 20 evenements
        $events = [
            'Frontend Masters',
            'Backend Masters',
            'Truth about PHP',
            'Symfony 7, what\'s new ?',
            'React, framework or library ?',
            'Vue.js, the new challenger ?',
            'Angular, the old one ?',
            'Web components, the future ?',
            'WebAssembly, how to use it ?',
            'GPDR, how to be compliant ?',
            'Docker, the new way to deploy ?',
            'Kubernetes, scale like a boss ?',
            'AWS, the cloud leader ?',
            'Wordpress, still alive ?',
            'PHP 8.3, what\'s new ?',
            'UI/UX, for frontend developers',
            'API, the essential for frontend',
            'GraphQL vs REST, which is better ?',
            'Web security, how to protect ?',
            'Web performance, how to optimize ?',
        ];
        // Boucle pour créer 20 événements
        foreach ($events as $item) {
            $event = new Event();
            $event->setName($item)
                ->setTheme('Web development')
                ->setDate($faker->dateTimeBetween('-6 months', '+6 months'))
                ->setLocation($faker->city)
                ->setAttendee($faker->numberBetween(10, 100))
                ->setPrice($faker->numberBetween(0, 250))
                ;
            $manager->persist($event);
        }

        $manager->flush();
    }
}
