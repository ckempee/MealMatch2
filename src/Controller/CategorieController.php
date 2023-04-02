<?php

namespace App\Controller;

use App\Entity\Categories;
use App\Repository\RecetteRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategorieController extends AbstractController
{
    #[Route('/categorie', name: 'app_categorie')]
    public function index(): Response
    {
        return $this->render('categorie/index.html.twig', [
            'controller_name' => 'CategorieController',
        ]);
    }

    #[Route('/categorie/{id}', name: 'categorie_show',  methods: ['GET', 'POST'])]
    public function show(Categories $categorie): Response
    {
       
        return $this->render('categorie/show.html.twig', [
            'categorie' => $categorie
        ]);
    }
}
