<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use AppBundle\Entity\DocumentAttachment;

/**
 * @ORM\Entity
 * @ORM\Table(name="document")
 */
class Document
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string",length=20)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $creator;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @ORM\OneToMany(targetEntity="DocumentAttachment", mappedBy="document" , cascade={"persist", "remove"})
     */
    private $attachments;

    /**
     * Document constructor.
     */
    public function __construct()
    {
        $this->attachments = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getCreator()
    {
        return $this->creator;
    }

    /**
     * @param mixed $creator
     */
    public function setCreator($creator)
    {
        $this->creator = $creator;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return mixed
     */
    public function getAttachments()
    {
        return $this->attachments;
    }

    /**
     * @param DocumentAttachment $attachment
     */
    public function addAttachments(DocumentAttachment $attachment)
    {
        $this->attachments->add($attachment);
        $attachment->setDocument($this);
    }

    public function removeAttachment(DocumentAttachment $attachment)
    {
        $this->attachments->removeElement($attachment);
    }
}
