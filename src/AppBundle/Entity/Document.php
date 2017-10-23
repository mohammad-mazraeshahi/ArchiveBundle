<?php

namespace AppBundle\Entity;

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
     * @ORM\Column(type="string",length=255,nullable=true)
     */
    private $description;
    /**
     * @ORM\Column(type="string",length=50,nullable=true)
     */
    private $creator;
    /**
     * @ORM\Column(type="datetime",nullable=true)
     */
    private $createDate;
    /**
     * @ORM\Column(nullable=true)
     * @ORM\OneToMany(targetEntity="DocumentAttachment", mappedBy="document" , cascade={"persist"})
     */
    private $attachments;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Document
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Document
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set creator
     *
     * @param string $creator
     *
     * @return Document
     */
    public function setCreator($creator)
    {
        $this->creator = $creator;

        return $this;
    }

    /**
     * Get creator
     *
     * @return string
     */
    public function getCreator()
    {
        return $this->creator;
    }

    /**
     * Set createDate
     *
     * @param \DateTime $createDate
     *
     * @return Document
     */
    public function setCreateDate($createDate)
    {
        $this->createDate = $createDate;
        return $this;
    }

    /**
     * Get createDate
     *
     * @return \DateTime
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }

    /**
     * Set attachmentId
     *
     * @param DocumentAttachment $attachments
     *
     * @return Document
     */
    public function addAttachments(DocumentAttachment $attachments)
    {
        $this->attachments->add($attachments);

        return $this;
    }

    /**
     * Get attachmentId
     *
     * @return integer
     */
    public function getAttachments()
    {
        return $this->attachments;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->attachments = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add attachmentId
     *
     * @param \AppBundle\Entity\DocumentAttachment $attachmentId
     *
     * @return Document
     */
    public function addAttachmentId(\AppBundle\Entity\DocumentAttachment $attachmentId)
    {
        $this->attachments[] = $attachmentId;

        return $this;
    }

    /**
     * Remove attachmentId
     *
     * @param \AppBundle\Entity\DocumentAttachment $attachmentId
     */
    public function removeAttachmentId(\AppBundle\Entity\DocumentAttachment $attachmentId)
    {
        $this->attachments->removeElement($attachmentId);
    }
}
