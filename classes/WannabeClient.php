<?php
require 'classes/MongoClient.php';
require 'classes/WannabeModel.php';

class WannabeClient extends MongoClient
{
    public $lastid;
    public $requiredFields = ["name","father","mother","email"];

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

            //Check op reeds bestaand naam/email combinatie
            $c = parent::GetFirst( Array("name" => $name, "email" => $email) );

            if ( !empty($c) ) {
                return "Registration $name/$email already exists";
            }

            $status = parent::Create($this->wannabe, $this->requiredFields);
            $this->lastid = $this->wannabe->_id;

            return $status;
    }

}