<?php

namespace AppBundle\Service;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploader
{
    private $targetDir;

    public function __construct($targetDir)
    {
        $this->targetDir = $targetDir;
    }

    public function upload(UploadedFile $file)
    {
        $fileName = $file->getClientOriginalName();
        $file = $file->move($this->getUploadDir(), $fileName);

        return $file;
    }

    public function getUploadDir()
    {
        return $this->targetDir;

    }
}