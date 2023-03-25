<?php

namespace App\Controller;

use App\Entity\Recette;
use App\Form\RecetteType;
use App\Repository\RecetteRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;




class RecetteController extends AbstractController
{
    //l'index va me permettre de voir mes recettes
    //récuperer le user!!!! 
    #[Route('/recette', name: 'recette.index')]
    public function index(RecetteRepository $repository,PaginatorInterface $paginator,Request $request): Response
    {
        //je récupère toutes les recettes
        $recettes=$paginator->paginate(
            $repository->findAll(),
            $request->query->getInt('page', 1),
            5
        );
        
        //je les envois à la vue
        return $this->render('recette/index.html.twig', [
            'recettes'=>$recettes
        ]);
    }

    #[Route('/recette/creation', name: 'recette.creation')]
    public function new(): Response
    {
        $recette=new Recette();
        $form=$this->createForm(RecetteType::class, $recette);
        return $this->render('recette/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
