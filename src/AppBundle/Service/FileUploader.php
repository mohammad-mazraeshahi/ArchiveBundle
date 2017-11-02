<?php

namespace AppBundle\Service;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploader
{
    private static $targetDir;

    public function __construct($targetDir)
    {
        self::$targetDir = $targetDir;
    }
	
    public static function upload(UploadedFile $file, $fileName = null)
    {
		$fileName = (is_null($fileName)? md5(uniqid()) :$fileName).'.'.$file->guessExtension();
        $file->move(self::getUploadDir() , $fileName);
        return $fileName;
    }
	
    public static function getUploadDir()
    {
        return self::$targetDir;
    }
}