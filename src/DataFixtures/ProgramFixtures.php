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
        'walkingDead.jpg',
        'Loki.webp',
        'TooOldToDieYoung.jpg',
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
        $program->setTitle('Resident Evil');
        $program->setPoster('residentEvil.webp');
        $program->setSynopsis('Resident Evil is an American action horror television series developed by Andrew Dabb for Netflix. Loosely based on the video game series of the same name by Capcom, it is the second television adaptation of the franchise after the animated miniseries Infinite Darkness (2021), and the third live-action adaptation after the film series of the same name and the reboot film Welcome to Raccoon City (2021). The series is set in its own universe but features the video game series\' storyline as its backstory and basis.');
        $program->setCategory($this->getReference('category_Horror'));
        $this->addReference('program_ResidentEvil', $program);
        $manager->persist($program);

        $program = new Program();
        $program->setTitle('Arcane');
        $program->setPoster('arcane.jpeg');
        $program->setSynopsis('Amid the stark discord of twin cities Piltover and Zaun, two sisters fight on rival sides of a war between magic technologies and clashing convictions.');
        $program->setCategory($this->getReference('category_Animation'));
        $this->addReference('program_Arcane', $program);
        $manager->persist($program);

        $program = new Program();
        $program->setTitle('A Time Travelers Wife');
        $program->setPoster('TimeTravelersWife.webp');
        $program->setSynopsis('The Time Traveler\'s Wife is a science fiction romantic drama television series based on the 2003 novel of the same name by Audrey Niffenegger. The series was developed and written by Steven Moffat, who had previously taken inspiration from Niffenegger\'s novel for his work on the science fiction series Doctor Who. It was directed by David Nutter, stars Rose Leslie and Theo James, and premiered on HBO on May 15, 2022. The series received a generally negative reception, and was canceled after one season in July 2022. The fans of the show started a petition to save the series by approaching other streaming platforms to pick it up for renewal. It was removed from HBO Max in December 2022.');
        $program->setCategory($this->getReference('category_Love'));
        $this->addReference('program_TheTimeTravelersWife', $program);
        $manager->persist($program);

        $program = new Program();
        $program->setTitle('18+');
        $program->setPoster('18.jpg');
        $program->setSynopsis('Sure you are 18+?');
        $program->setCategory($this->getReference('category_Adult'));
        $this->addReference('program_18', $program);
        $manager->persist($program);



        $program = new Program();
        $program->setTitle('Faker The Series!');
        $program->setPoster('FakerPHP.webp');
        $program->setSynopsis('Faker is a PHP library that generates fake data for you. Whether you need to bootstrap your database, create good-looking XML documents, fill-in your persistence to stress test it, or anonymize data taken from a production service, Faker is for you.');
        $program->setCategory($this->getReference('category_Horror'));
        $this->addReference('program_Faker', $program);
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
