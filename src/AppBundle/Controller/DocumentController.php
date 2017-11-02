<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Document;
use AppBundle\Form\DocumentType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


/**
 *
 * @Route("document")
 */
class DocumentController extends Controller
{

    /**
     *
     * @Route("/", name="category_index")
     * @Method("GET")
     */
    public function indexAction(Request $request)
    {
        return $this->render('AppBundle:Document:index.html.twig');
    }


    /**
     * @Route("/new", name="document_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $document= new Document();

        $form = $this->createForm(DocumentType::class, $document);
        $form->handleRequest($request);


        if ( $form->isSubmitted() && $form->isValid() ) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($document);
            $em->flush();

            return $this->redirectToRoute('document_show', array('id' => $document->getId()));
        }


        return $this->render('AppBundle:Document:new.html.twig', array(
            'document' => $document,
            'form' => $form->createView(),
        ));
    }


    /**
     *
     * @Route("/{id}", name="document_show")
     * @Method("GET")
     */
    public function showAction(Document $document)
    {
        return $this->render('AppBundle:Document:show.html.twig', array(
            'document' => $document,
        ));
    }
}
