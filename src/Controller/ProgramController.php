<?php

namespace App\Controller;

use App\Entity\Episode;
use App\Entity\Program;
use App\Entity\Season;
use App\Form\ProgramType;
use App\Repository\ProgramRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProgramController extends AbstractController
{
    #[Route('/program', name: 'index')]
    public function index(ProgramRepository $programRepository): Response
    {
        $programs = $programRepository->findAll();
        return $this->render('program/index.html.twig', [
            'programs' => $programs,
        ]);
    }


#[Route('/program/{id<^[0-9]+$>}/', name: 'show')]
public function show(Program $program): Response
{
    return $this->render('program/show.html.twig', ['program'=>$program]);
}


#[Route('/program/{program}/season/{season}', name: 'showSeason')]
public function showSeason(Program $program, Season $season ): Response
{
    return $this->render('program/season_show.html.twig', [
        'program' => $program,
        'season' => $season,
    ]);
}
#[Route('/program/{program}/season/{season}/episode/{episode}', name: 'showEpisode')]
    public function showEpisode(Program $program, Season $season, Episode $episode): Response
{
        return $this->render('program/episode_show.html.twig', [
            'program' => $program,
            'season' => $season,
            'episode' => $episode,
            ]);
}

    #[Route('/program/form/new', name: 'new')]
    public function new(Request $request, ProgramRepository $programRepository): Response
    {
        $program = new Program();
        $form = $this->createForm(ProgramType::class, $program);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {

            $programRepository->save($program, true);

            return $this->redirectToRoute('index');
        }

        return $this->render('program/new.html.twig', [
            'form' => $form,
        ]);
    }


}