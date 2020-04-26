<?php


require 'classes/MongoClient.php';
require 'classes/FamilyMemberModel.php';
require_once 'classes/AuthTrait.php';


class FamilyMemberClient extends MongoClient
{
    use family\AuthTrait;
    private $requiredFields = ["username", "email", "password"];

    private $fmember;
    function __construct($db,$coll)
    {
        parent::__construct($db);
        parent::SetCollection($coll);
    }

    //authenticate
    public function Auth($l, $p) {
        //authenticate by username or email
        $doc = $this->GetFirst(Array('username' => $l));
        //var_dump($doc);
        if (empty($doc))
             $doc = $this->GetFirst(Array('email' => $l));

        if (empty($doc))
            return false;

        return $this->VerifyPassword($p, $doc->password);
    }

    public function CreateOne($u,$e,$p) {

        $c = parent::GetAsCursor( Array("username" => $u) );
        if ( count($c->toArray()) > 0 ) {
            return "user '$u' already exists";
        }

        $c = parent::GetAsCursor( Array("email" => $e) );
        if ( count($c->toArray()) > 0 ) {
            return "emailaddress '$e' is already taken";
        }

        if (!empty($u) && !empty($e) && !empty($p)) {
            $this->fmember = new FamilyMemberModel($u,$e,$p);
            parent::Create($this->fmember, $this->requiredFields);
        }  
        else {
            return "All fields are required";
        }
    }

    public function Update() {}

    public function Delete() {}
}
