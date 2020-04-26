<?php
require 'classes/MongoClient.php';
require 'classes/WannabeModel.php';

class WannabeClient extends MongoClient
{

    public $lastid;

    function __construct($db, $coll)
    {
        parent::__construct($db);
        parent::SetCollection($coll);
        date_default_timezone_set('Europe/Amsterdam');
    }

    //
    public function Add($name,$father,$mother,$email)
    {
            $this->wannabe = new WannabeModel($name,$father,$mother,$email);
            $status = parent::Create($this->wannabe);

            $this->lastid = $this->wannabe->_id;

            return $status;
    }

}