<?php

namespace App\Controller;

use App\Repository\RecetteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RecetteController extends AbstractController
{
    //l'index va me permettre de voir mes recettes
    //récuperer le user!!!! 
    #[Route('/recette', name: 'recette.index')]
    public function index(RecetteRepository $repository): Response
    {
        //je récupère toutes les recettes
        $recettes=$repository->findAll();
        
        //je les envois à la vue
        return $this->render('recette/index.html.twig', [
            'recettes'=>$recettes
        ]);
    }
}
