<?php

 namespace AppBundle\Model\Handler;

 use AppBundle\Entity\Document;
 use AppBundle\Entity\DocumentAttachment;
 use Doctrine\ORM\EntityManager;

 class DocumentHandler
 {

     private $em;

     public function __construct(EntityManager $entityManager)
     {
         $this->em = $entityManager;
     }
     public function saveDocument(Document $document){
        $document->setCreateDate(new \DateTime);
        $this->em->persist($document);
        $this->em->flush();
     }
     public function saveAttachmentDocument(DocumentAttachment $Documentattachment)
     {
         $this->em->persist($Documentattachment);
         $this->em->flush();
     }
 }