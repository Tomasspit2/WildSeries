<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\ProgramRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('category', name: 'category_')]
class CategoryController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(CategoryRepository $categoryRepository): Response
    {
        $category = $categoryRepository->findAll();
        return $this->render('category/index.html.twig', [
            'category' => $category,
        ]);
    }

    #[Route('/{categoryName}', name: 'show')]
    public function show(CategoryRepository $categoryRepository, ProgramRepository $programRepository, string $categoryName): Response
    {
        $category = $categoryRepository->findOneBy(['name' => $categoryName]);

        if (!$category) {
            throw $this->createNotFoundException('No category with name: '.$categoryName.' found!');
        }

        $programs = $programRepository->findBy(['category' => $category], ['id' => 'DESC'], 3);

        if (!$programs)
            throw $this->createNotFoundException('There are no programs found that are listed with the category : '.$categoryName.'!');

        return $this->render('category/show.html.twig', [
            'category' => $category,
            'programs' => $programs,
        ]);
    }
}