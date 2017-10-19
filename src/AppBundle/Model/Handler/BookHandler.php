<?php

 namespace AppBundle\Model\Handler;

 use AppBundle\Entity\Book;
 use Doctrine\ORM\EntityManager;

 class BookHandler
 {

     private $em;

     public function __construct(EntityManager $entityManager)
     {
         $this->em = $entityManager;
     }
     public function saveBook(Book $book){

        $this->em->persist($book);
        $this->em->flush();

     }
 }