<?php

namespace App\DataFixtures;

use App\Entity\Episode;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

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

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [SeasonFixtures::class];
    }
}
