<?php
require 'vendor/autoload.php';
require_once 'classes/AuthTrait.php';

class FamilyMember {
    public $_id;
    public $username;
    public $email;
    public $password;

    use family\AuthTrait;

    private $requiredFields = ["username", "email", "password"];

    function __construct($u, $e, $p)
    {
        $this->_id = new MongoDB\BSON\ObjectId();
        $this->username = $u;
        $this->email = $e;
        $this->password = $this->HashPassword($p);
    }

 
}