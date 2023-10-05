<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Author1Controller extends AbstractController
{
    public $authors1 = array(


        array(
            'id' => 1, 'picture' => '/images/Victor-Hugo.jpg',
            'username' => ' Victor Hugo', 'email' => 'victor.hugo@gmail.com ', 'nb_books' => 100
        ),
        array(
            'id' => 2, 'picture' => '/images/william-shakespeare.jpg',
            'username' => ' William Shakespeare', 'email' => ' william.shakespeare@gmail.com', 'nb_books' => 200
        ),
        array(
            'id' => 3, 'picture' => '/images/Taha_Hussein.jpg',
            'username' => ' Taha Hussein', 'email' => 'taha.hussein@gmail.com', 'nb_books' => 300
        ),
    );

    #[Route('/author1', name: 'app_author1')]
    public function index(): Response
    {
        return $this->render('author1/index.html.twig', [
            'controller_name' => 'Author1Controller',
        ]);
    }

    #[Route('/author1/{n}', name: 'app_show')]
    public function showAuthor1($n){
      return $this->render('author1/show.html.twig',['name'=>$n]);
    }

    #[Route('/list',name: 'list')]
    public function list(){
        $authors1 = array(
            array('id' => 1, 'picture' => 'images/victor-hugo.jpg','username' => 'Victor Hugo', 'email' =>
                'victor.hugo@gmail.com ', 'nb_books' => 100),
            array('id' => 2, 'picture' => 'images/william-shakespeare.jpg','username' => ' William Shakespeare', 'email' =>
                ' william.shakespeare@gmail.com', 'nb_books' => 200 ),
            array('id' => 3, 'picture' => 'images/Taha_Hussein.jpg','username' => 'Taha Hussein', 'email' =>
                'taha.hussein@gmail.com', 'nb_books' => 300),
        );
    return $this->render('author1/list.html.twig',['authors1'=>$authors1]);
    }
    #[Route('/show/{id}',name: 'show')]
    public function auhtorDetails ($id)
    {
        $author1 = null;
        // Parcourez le tableau pour trouver l'auteur correspondant à l'ID
        foreach ($this->authors1 as $author1Data) {
            if ($author1Data['id'] == $id) {
                $author1 = $author1Data;
            };
        };
        return $this->render('author1/showAuthor1.html.twig', [
            'author1' => $author1,
            'id' => $id
        ]);
    }



}
