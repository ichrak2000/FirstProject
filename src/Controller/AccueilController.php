<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    #[Route('/accueil', name: 'app_accueil')]
    public function index(): Response
    {
        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }

    #[Route('/test1/{id}', name: 'app_test1')] // creation de route
    public function test1($id)
    {
        return $this->render('accueil/home.html.twig' , ['param' =>'hello']);
    }

}
