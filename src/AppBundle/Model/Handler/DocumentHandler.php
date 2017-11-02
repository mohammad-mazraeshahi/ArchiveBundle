<?php

 namespace AppBundle\Model\Handler;

 use AppBundle\Entity\Document;
 use Doctrine\ORM\EntityManager;

 class DocumentHandler
 {

     private $em;

     public function __construct(EntityManager $entityManager)
     {
         $this->em = $entityManager;
     }
     public function saveBook(Document $document){

        $this->em->persist($document);
        $this->em->flush();

     }
 }