<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Document;
use AppBundle\Entity\DocumentAttachment;
use AppBundle\Form\DocumentType;
use AppBundle\Form\DocumentAttachmentType;
use AppBundle\Model\Handler\DocumentHandler;
use AppBundle\Service\FileUploader;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="add_document")
     */
    public function newAction(Request $request)
    {
        $document= new Document();

        $form = $this-> createForm(DocumentType::class , $document);
        $form->handleRequest($request);

        if ( $form->isSubmitted() ) {
            $documentSave= $this->get(DocumentHandler::class);
            $documentSave->saveDocument($document);
        }


        return $this->render('AppBundle:Default:index.html.twig' , array(
            'form' => $form->createView(),
        ));

    }

    /**
     * @Route("/attach", name="add_document_attach")
     *
     */
    public function uploadAction(Request $request , FileUploader $fileUploader)
    {
        $attach = new DocumentAttachment();

        $form = $this->createForm(DocumentAttachmentType::class, $attach);
        $form->handleRequest($request);


        if ( $form->isSubmitted() ) {

            $file = $attach->getFile();

            $file = $fileUploader->upload($file);

            $attach->setFile($file);
            $attach->setPath($file);
            $attach->setType($file->getExtension());
            $em = $this->getDoctrine()->getManager();
            $em->persist($attach);
            $em->flush();
        }
        return $this->render('AppBundle:Default:index.html.twig' , array(
            'form' => $form->createView(),
        ));


    }
}
