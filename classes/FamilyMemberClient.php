<?php
require 'classes/Mongoclient.php';
require 'classes/FamilyMember.php';

class FamilyMemberClient extends Mongoclient
{
    private $fmember;
    function __construct($db,$coll)
    {
        parent::__construct($db);
        parent::SetCollection($coll);
    }


    public function Auth() {
    
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
            $this->fmember = new FamilyMember($u,$e,$p);
            parent::Create($this->fmember);           
        }  
        else {
            return "All fields are required";
        }
    }

    public function Update() {}

    public function Delete() {}
}
