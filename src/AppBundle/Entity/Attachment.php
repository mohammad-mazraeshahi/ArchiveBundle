<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use AppBundle\Service\FileUploader;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Repository\AttachmentRepository")
 * @ORM\Table(name="attachment")
 * @ORM\HasLifecycleCallbacks
 */
class Attachment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     * @ORM\Column(type="guid")
     */
    private $id;
    /**
     * @ORM\Column(type="string",length=20)
     * @Assert\Length(
     *      max = 20
     * )
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="Document", inversedBy="attachments")
     */
    private $document;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $path;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $file;

    /**
     * @ORM\Column(type="datetime", name="created_at")
     * @Assert\DateTime()
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", name="updated_at", nullable=true)
     * @Assert\DateTime()
     */
    private $updatedAt;


    /**
     * Get id
     *
     * @return guid
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
     * @return Attachment
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
     * Set file
     *
     * @param UploadedFile $uploadedFile
     *
     * @return Attachment
     */
    public function setFile(UploadedFile $uploadedFile = null)
    {

        if (!is_null($uploadedFile)) {
            $fileName = FileUploader::upload($uploadedFile);
            $this->path = FileUploader::getUploadDir();
            $this->name = $uploadedFile->getClientOriginalName();
            $this->file = $fileName;
        }
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
     * Set createdAt
     *
     * @ORM\PrePersist()
     *
     * @return Attachment
     */
    public function setCreatedAt()
    {
        $this->createdAt = new \DateTime();

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @ORM\PreUpdate()
     *
     * @return Attachment
     */
    public function setUpdatedAt()
    {
        $this->updatedAt = new \DateTime();

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set document
     *
     * @param \AppBundle\Entity\Document $document
     *
     * @return Attachment
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
