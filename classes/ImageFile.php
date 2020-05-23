<?php

class ImageFile
{
    //pad en bestandsnaam met pad
    private $baseSavePath;
    public $fullFilename;

    function __construct($p, $name)
    {
        $this->baseSavePath = $p."/";
        $this->fullFilename = $this->baseSavePath.$name;
    }

    function saveImage($contents, $flags = EX_LOCK)
    {
        //false als het mislukt anders het aantal bytes
        return file_put_contents( $this->fullFilename, $contents);
    }

    function getImage()
    {
        if (file_exists($this->fullFilename)) {
            return file_get_contents($this->fullFilename);
        } else
            {
            return false;
        }
    }
}
