<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\File\UploadedFile;

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
     * Many Attachments have One Document.
     * @ORM\ManyToOne(targetEntity="Document", inversedBy="attachments")
     * @ORM\JoinColumn(name="idAttachment", referencedColumnName="attachments")
     */

    private $idAttachment;

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
     * Get idAttachment
     *
     * @return integer
     */
    public function getIdAttachment()
    {
        return $this->idAttachment;
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
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get file
     *
     * @return UploadedFile
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
}
