<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use AppBundle\Service\FileUploader;

/**
 * @ORM\Entity
 * @ORM\Table(name="attachment")
 */
class DocumentAttachment
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     */
    private $id;

     /**
     *
     * @ORM\ManyToOne(targetEntity="Document", inversedBy="attachments")
     * @ORM\JoinColumn(name="attachments_id")
     */

    private $document;

    /**
     * @ORM\Column(type="string",length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string",length=255 ,nullable=true)
     */
    private $path;

    /**
     * @ORM\Column(type="string",length=255 ,nullable=true)
     * @Assert\File(maxSize="6000000")
     */
    private $file;

    /**
     * @ORM\Column(type="string",length=20 ,nullable=true)
     */
    private $type;


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
     * @return DocumentAttachment
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
     * Set path
     *
     * @param string $path
     *
     * @return DocumentAttachment
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set file
     *
     * @param UploadedFile $file
     *
     * @return DocumentAttachment
     */
    public function setFile(UploadedFile $uploadedFile )
    {
        $file= new FileUploader();
        $this->file = $file->upload($uploadedFile);

        return $this;
    }

    /**
     * Get file
     *
     * @return string
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return DocumentAttachment
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set attachment
     *
     * @param \AppBundle\Entity\Document $attachment
     *
     * @return DocumentAttachment
     */
    public function setAttachment(\AppBundle\Entity\Document $attachment = null)
    {
        $this->attachment = $attachment;

        return $this;
    }

    /**
     * Get attachment
     *
     * @return \AppBundle\Entity\Document
     */
    public function getAttachment()
    {
        return $this->attachment;
    }

    /**
     * Set document
     *
     * @param \AppBundle\Entity\Document $document
     *
     * @return DocumentAttachment
     */
    public function setDocument(\AppBundle\Entity\Document $document = null)
    {
        $this->document = $document;

        return $this;
    }

    /**
     * Get document
     *
     * @return \AppBundle\Entity\Document
     */
    public function getDocument()
    {
        return $this->document;
    }
}
