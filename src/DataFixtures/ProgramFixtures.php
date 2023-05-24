<?php

namespace App\DataFixtures;

use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProgramFixtures extends Fixture
{
    const programTitles = [
        'Walking dead',
        'Loki',
        'Too Old To Die Young',
        'The Punisher',
    ];

    const programPoster =   [
        'walkingDead.jpeg',
        'Loki.webp',
        'TooOldToDieYoung.jpeg',
        'punisher.jfif',
    ];

    const programSynopsis = [
        'Zombies are conquering the world!',
        'Loki on his worst behaviour!',
        'American crime drama streaming miniseries directed by Nicolas Winding Refn',
        'Aimless Marine veteran Frank Castle finds a new meaning in life as a vigilante known as "The Punisher".'
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::programTitles as $key => $programTitle) {
            $program = new Program();
            $program->setTitle($programTitle);
            $program->setPoster(self::programPoster[$key]);
            $program->setSynopsis(self::programSynopsis[$key]);
            $program->setCategory($this->getReference('category_Action'));
            $manager->persist($program);
        }

        $program = new Program();
        $program->setTitle('StarWars');
        $program->setPoster('starWars.jpg');
        $program->setSynopsis('Star Wars is an American epic space opera multimedia franchise created by George Lucas');
        $program->setCategory($this->getReference('category_SF'));
        $this->addReference('program_StarWars', $program);
        $manager->persist($program);

        $program = new Program();
        $program->setTitle('How I Met Your Mother');
        $program->setPoster('howIMetYourMother.jfif');
        $program->setSynopsis('How I Met Your Father is an American sitcom created by Isaac Aptaker and Elizabeth Berger');
        $program->setCategory($this->getReference('category_Love'));
        $this->addReference('program_HowIMetYourMother', $program);
        $manager->persist($program);

        $program = new Program();
        $program->setTitle('Arcane');
        $program->setPoster('arcane.jpeg');
        $program->setSynopsis('Amid the stark discord of twin cities Piltover and Zaun, two sisters fight on rival sides of a war between magic technologies and clashing convictions.');
        $program->setCategory($this->getReference('category_Animation'));
        $this->addReference('program_Arcane', $program);
        $manager->persist($program);

        $manager->flush();
    }


    public function getDependencies(): array
    {
        return [
            CategoryFixtures::class,
        ];
    }
}
