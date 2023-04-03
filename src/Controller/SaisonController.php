<?php

namespace App\Controller;

use App\Entity\Saison;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SaisonController extends AbstractController
{
    #[Route('/saison/{id}', name: 'saison_show',  methods: ['GET', 'POST'])]
    public function show(Saison $saison): Response
    {
       
        return $this->render('saison/show.html.twig', [
            'saison' => $saison
        ]);
    }
}
