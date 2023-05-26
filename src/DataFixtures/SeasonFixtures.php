<?php

namespace App\DataFixtures;

use App\Entity\Season;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class SeasonFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $season = new Season();
        $season->setNumber(1);
        $season->setProgram($this->getReference('program_Arcane'));
        $season->setYear(2022);
        $season->setDescription('The delicate balance between the rich city of Piltover and the seedy underbelly of Zaun. Tensions between these city-states boil over with the creation of hextech a way for any person to control magical energy in Piltover, and in Zaun, a new drug called shimmer transforms humans into monsters. The rivalry between the cities splits families and friends as Arcane brings life to the relationships that shape some of League of Legends\' famous champions including Vi, Jinx, Caitlyn, Jayce and Viktor.');
        $manager->persist($season);
        $this->addReference('season1_Arcane', $season);

        $season = new Season();
        $season->setNumber(1);
        $season->setProgram($this->getReference('program_HowIMetYourMother'));
        $season->setYear(2005);
        $season->setDescription('Ted Mosby sits down with his kids, to tell them the story of how he met their mother. The story is told through memories of his friends Marshall, Lily, Robin, and Barney Stinson.');
        $manager->persist($season);
        $this->addReference('season1_HowIMetYourMother', $season);

        $season = new Season();
        $season->setNumber(1);
        $season->setProgram($this->getReference('program_ResidentEvil'));
        $season->setYear(2022);
        $season->setDescription('Nearly three decades after the discovery of the T-virus, an outbreak reveals the Umbrella Corporation\'s dark secrets.');
        $manager->persist($season);
        $this->addReference('season1_ResidentEvil', $season);

        $season = new Season();
        $season->setNumber(1);
        $season->setProgram($this->getReference('program_TheTimeTravelersWife'));
        $season->setYear(2022);
        $season->setDescription('Tells the intricate love story of Clare and Henry, and a marriage with a problem... time travel.');
        $manager->persist($season);
        $this->addReference('season1_TimeTravelersWife', $season);


        $faker = Factory::create();

        for ($j = 0; $j < 5; $j++) {
            $season = new Season();
            $season->setNumber($j + 1);
            $season->setProgram($this->getReference('program_Faker'));
            $season->setYear($faker->numberBetween(2000, 2023));
            $season->setDescription($faker->paragraph);
            $manager->persist($season);
            $this->addReference('season_' . $j, $season);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [ProgramFixtures::class];
    }
}
