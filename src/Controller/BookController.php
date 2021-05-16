<?php

namespace App\Controller;

use App\Entity\Book;
use App\Form\AddBookType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BookController extends AbstractController
{
    /**
     * Function return list all books
     * @Route("/", name="listBooks")
     */
    public function listBooks()
    {
        $books = $this->getDoctrine()->getRepository(Book::class)->findBasicData();

        return $this->render('bookList.html.twig', [
            'books' => $books
        ]);
    }

    /**
     * Function saving the book to database
     * @Route("/dodaj-ksiazke", name="addBook")
     */
    public function addBook(Request $request)
    {
        $book = new Book();
        $addBook = $this->createForm(AddBookType::class, $book);
        $addBook->handleRequest($request);
        if ($addBook->isSubmitted() && $addBook->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($book);
            $em->flush();
            $this->addFlash('success', 'Dodano książkę');
            return $this->redirectToRoute('listBooks');
        }

        return $this->render('addBook.html.twig', [
            'addBook' => $addBook->createView()
        ]);
    }

    /**
     * Function return all details book
     * @Route("/ksiazka/{id}", name="detailsBook")
     */
    public function detailsBook($id)
    {
        $book = $this->getDoctrine()->getRepository(Book::class)->findOneBy(['id' => $id]);;

        return $this->render('bookDetails.html.twig', [
            'book' => $book
        ]);
    }
}