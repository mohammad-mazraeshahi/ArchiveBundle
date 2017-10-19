<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Book;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\BookType;
use AppBundle\Model\Handler\BookHandler;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="add_book")
     */
    public function newAction(Request $request)
    {
        $book= new Book();

        $form = $this-> createForm(BookType::class , $book);

        $form->handleRequest($request);

        if ( $form->isSubmitted() ) {
            $bookSave= $this->get(BookHandler::class);
            $bookSave->saveBook($book);
        }


        return $this->render('AppBundle:Default:index.html.twig' , array(
            'form' => $form->createView(),
        ));


    }
}
