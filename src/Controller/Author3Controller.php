<?php

namespace App\Controller;

use App\Entity\Author3;
use App\Form\AuthorType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\Author3Repository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Author3Controller extends AbstractController
{
    #[Route('/author3', name: 'app_author3')]
    public function index(): Response
    {
        return $this->render('author3/index.html.twig', [
            'controller_name' => 'Author3Controller',
        ]);
    }


    #[Route('/affiche', name: 'app_affiche')]
        public function affiche (Author3Repository $repository)
        {
             $author=$repository->findAll() ;        
             return $this->render('author3/affiche.html.twig',['author3'=>$author]);
        }
    


        #[Route('/addstatic', name: 'app_addstatic')]
public function addstatic(EntityManagerInterface $entityManager): Response
{
    $author4= new Author3();
    $author4->setUsername('test');
    $author4->setEmail('testttttt@gmail.com');
 
    $entityManager->persist($author4);
    $entityManager->flush();

    return $this->redirectToRoute('app_affiche');

}


#[Route('/add-author3', name: 'app_add_author')]
public function addAuthor(Request $request): Response
{
    $author3 = new Author3();
    $form = $this->createForm(AuthorType::class, $author3);

    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $entityManager = $this  ->getDoctrine()->getManager();
        $entityManager->persist($author3);
        $entityManager->flush();
        return $this->redirectToRoute('app_affiche');
    }

    return $this->render('author3/add_author.html.twig', [
        'form' => $form->createView(),
    ]);
}

#[Route('/edit/{id}', name: 'app_edit_author')]
public function edit(Request $request, EntityManagerInterface $entityManager, int $id): Response
{
    $author = $entityManager->getRepository(Author3::class)->find($id);

    if (!$author) {
        throw $this->createNotFoundException('Auteur non trouvé');
    }

    $form = $this->createForm(AuthorType::class, $author);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        // Enregistrez les modifications de l'auteur en base de données
        $entityManager->flush();

        // Redirigez l'utilisateur vers la liste des auteurs ou une autre page appropriée
        return $this->redirectToRoute('app_affiche');
    }

    return $this->render('author3/edit.html.twig', [
        'form' => $form->createView(),
    ]);

}
#[Route('/delete/{id}', name: 'app_delete_author')]
public function delete(Request $request, EntityManagerInterface $entityManager, Author3 $author): Response
{
    // Vérifiez si le formulaire a été soumis et si la demande est une demande POST
    if ($request->isMethod('POST')) {
        // Supprimez l'auteur de la base de données
        $entityManager->remove($author);
        $entityManager->flush();

        // Redirigez l'utilisateur vers la liste des auteurs ou une autre page appropriée
        return $this->redirectToRoute('app_affiche');
    }

    // Affichez un formulaire de confirmation de suppression
    return $this->render('author3/delete.html.twig', [
        'author' => $author,
    ]);
}


}

