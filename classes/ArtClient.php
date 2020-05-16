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
        return parent::Create($this->artmodel);
    }

    public function GetAllNames() {
        //Alle artiesten van de schilderij ophalen
        $alldocs =  parent::GetAllAsCursor();

        $alldocs = $alldocs->toArray();
        $filteredDocs = [];
        foreach ($alldocs as $doc) {
            //plaatje zelf niet meesturen, beetje teveel van het goeie
            unset($doc['imagedata']);
            $doc['imagecreated'] = date('d/m G:s',$doc['imagecreated']);
            $filteredDocs[] = $doc;
        }

        return $filteredDocs;
    }

    public function GetLast() {
        //Laatste toegevoegde imagedrawing ophalen
        return parent::GetLast( Array(), Array( 'imagecreated' => -1) );
    }

    public function GetFrom($p) {
        //imagedrawing op username ophalen
        return parent::GetFirstAsDoc( Array( 'username' => $p ));
    }

    public function Update() {}

    public function Delete() {}
}
