<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ServiceController extends AbstractController
{
    #[Route('/service/showservice/{name}', name: 'app_service')]
    public function showService($name):Response
    {
        return $this->render('service/index.html.twig',[
            'name'=>$name,
            
        ]);

    }
    #[Route('/gotoindex', name: 'app_index')]
    public function goToIndex(): Response
    {
        return $this->redirectToRoute('app_test');

    }


}
