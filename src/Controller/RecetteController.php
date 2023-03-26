<?php

namespace App\Controller;

use App\Entity\Recette;
use App\Form\RecetteType;

use App\Repository\RecetteRepository;
use Doctrine\ORM\EntityManagerInterface;
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
            $repository->findBy(['user' => $this->getUser()]),
            $request->query->getInt('page', 1),
            5
        );
        
        //je les envois à la vue
        return $this->render('recette/index.html.twig', [
            'recettes'=>$recettes
        ]);
    }

    #[Route('/recette/creation', name: 'recette.creation')]
    public function new(Request $request, EntityManagerInterface $manage): Response
    {
        //créer une nouvelle recette vide
        $recette=new Recette();
        //rajouter cette recette vide dans le formulaire
        $form=$this->createForm(RecetteType::class, $recette);

        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) { 
            $recette=$form->getdata();
            $recette->setUser($this->getUser());
            $manage->persist($recette);

            $manage->flush();


            $this->addFlash(
                'success',
                'Votre recette a été créé avec succès !'
            );

            return $this->redirectToRoute('recette.index');



        }

       
        return $this->render('recette/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/recette/edition/{id}', 'recette.edit', methods: ['GET', 'POST'])]
    public function edit(
        Recette $recette,
        Request $request,
        EntityManagerInterface $manager
    ): Response {
        $form = $this->createForm(RecetteType::class, $recette);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $recette=$form->getData();
            $manager->persist($recette);

            $manager->flush();

            $this->addFlash(
                'success',
                'Votre recette a été modifié avec succès !'
            );



            return $this->redirectToRoute('recette.index');
        }

        return $this->render('recette/edit.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/recette/suppression/{id}', 'recette.delete', methods: ['GET'])]
   
    public function delete(
        EntityManagerInterface $manager,
       Recette $recette
    ): Response {
        $manager->remove($recette);
        $manager->flush();

        $this->addFlash(
            'success',
            'Votre recette a été supprimé avec succès !'
        );

        return $this->redirectToRoute('recette.index');
    }

}
