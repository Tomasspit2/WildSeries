<?php

namespace App\DataFixtures;

use App\Entity\Episode;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class EpisodeFixtures extends Fixture implements DependentFixtureInterface
{
   public function load(ObjectManager $manager): void
    {
        $episode = new Episode();
        $episode->setSeason($this->getReference('season1_Arcane'));
        $episode->setTitle('Welcome to the Playground');
        $episode->setNumber(1);
        $episode->setSynopsis('Orphaned sisters Vi and Powder bring trouble to Zaun\'s underground streets in the wake of a heist in posh Piltover.');

        $manager->persist($episode);

        $episode = new Episode();
        $episode->setSeason($this->getReference('season1_Arcane'));
        $episode->setTitle('Some Mysteries Are Better Left Unsolved');
        $episode->setNumber(2);
        $episode->setSynopsis('Idealistic inventor Jayce attempts to harness magic through science --- despite his mentor\'s warning. Criminal kingpin Silco tests a powerful substance.');
        $manager->persist($episode);

        $episode = new Episode();
        $episode->setSeason($this->getReference('season1_Arcane'));
        $episode->setTitle('The Base Violence Necessary for Change');
        $episode->setNumber(3);
        $episode->setSynopsis('An epic showdown between old rivals results in a fateful moment for Zaun. Jayce and Viktor risk it all for their research.');
        $manager->persist($episode);

        $episode = new Episode();
        $episode->setSeason($this->getReference('season1_ResidentEvil'));
        $episode->setTitle('Welcome To Raccoon City');
        $episode->setNumber(1);
        $episode->setSynopsis('When the Wesker kids move to New Raccoon City, the secrets they uncover might just be the end of everything.');
        $manager->persist($episode);

        $episode = new Episode();
        $episode->setSeason($this->getReference('season1_TimeTravelersWife'));
        $episode->setTitle('Episode #1.1');
        $episode->setNumber(1);
        $episode->setSynopsis('In the clearing behind her home, six-year-old Clare Abshire encounters 36-year-old time traveler Henry DeTamble for the first time. Fourteen years later, an unexpected reunion a the library gives Henry the opportunity to meet Clare.');
        $manager->persist($episode);

        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $episode = new Episode();
            $episode->setSeason($this->getReference('season_1'));
            $episode->setTitle($faker->sentence);
            $episode->setNumber($i + 1);
            $episode->setSynopsis($faker->paragraph);
            $manager->persist($episode);
        }

        for ($i = 0; $i < 10; $i++) {
            $episode = new Episode();
            $episode->setSeason($this->getReference('season_2'));
            $episode->setTitle($faker->sentence);
            $episode->setNumber($i + 1);
            $episode->setSynopsis($faker->paragraph);
            $manager->persist($episode);
        }

        for ($i = 0; $i < 10; $i++) {
            $episode = new Episode();
            $episode->setSeason($this->getReference('season_3'));
            $episode->setTitle($faker->sentence);
            $episode->setNumber($i + 1);
            $episode->setSynopsis($faker->paragraph);
            $manager->persist($episode);
        }

        for ($i = 0; $i < 10; $i++) {
            $episode = new Episode();
            $episode->setSeason($this->getReference('season_4'));
            $episode->setTitle($faker->sentence);
            $episode->setNumber($i + 1);
            $episode->setSynopsis($faker->paragraph);
            $manager->persist($episode);
        }

        for ($i = 0; $i < 10; $i++) {
            $episode = new Episode();
            $episode->setSeason($this->getReference('season_0'));
            $episode->setTitle($faker->sentence);
            $episode->setNumber($i + 1);
            $episode->setSynopsis($faker->paragraph);
            $manager->persist($episode);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [SeasonFixtures::class];
    }
}
