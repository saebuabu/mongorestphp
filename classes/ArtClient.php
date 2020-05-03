<?php

require 'classes/MongoClient.php';
require 'classes/ArtModel.php';

class ArtClient extends MongoClient
{
    private $requiredFields = ["username", "imagedata"];

    private $art;
    function __construct($db,$coll)
    {
        parent::__construct($db);
        parent::SetCollection($coll);
    }

    public function Save($u,$i) {

        $c = parent::GetAsCursor( Array("username" => $u) );
        if ( count($c->toArray()) > 0 ) {
            return "user '$u' already exists";
        }

        $this->artmodel = new ArtModel($u,$i);
        parent::Create($this->artmodel);
    }

    public function GetLast() {
        //Laatste toegevoegde imagedrawing ophalen
        return parent::GetLast( Array(), Array( 'imagecreated' => -1) );
    }

    public function Update() {}

    public function Delete() {}
}
