<?php
require 'vendor/autoload.php';

class ArtModel
{
    public $_id;
    public $username;
    public $imagedata;
    public $imagecreated;


    function __construct($u, $i)
    {
        $this->_id = new MongoDB\BSON\ObjectId();
        $this->username = $u;
        $this->imagedata = $i;
        $this->imagecreated = $this->created();
    }

    function created() {
        return strtotime("now");
    }

}