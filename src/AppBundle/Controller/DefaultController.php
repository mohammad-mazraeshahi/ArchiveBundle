<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Book;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="add_book")
     */
    public function newAction(Request $request)
    {
        $book= new Book();

        $form = $this-> createFormBuilder($book)
            ->add('name', TextType::class)
            ->add('title', TextType::class)
            ->add('save', SubmitType::class, array('label' => 'Save'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $book = $form->getData();


            $em = $this->getDoctrine()->getManager();
            $em->persist($book);
            $em->flush();
        }


        return $this->render('AppBundle:Default:index.html.twig' , array(
            'form' => $form->createView(),
        ));


    }
}
