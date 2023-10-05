<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    #[Route('/liste', name: 'app_test')]
    public function index(): Response
    {
        return $this->render('test/index.html.twig', [
            'message' => 'bonjour mes etuidants',
        ]);
    }
    
#[Route('/test', name: 'app_testt')]
public function affiche(){

    
        return new Response('bonjour mes etudants') ;

}

}







