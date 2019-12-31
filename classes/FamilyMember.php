<?php
require 'vendor/autoload.php';

class FamilyMember {
    public $_id;
    public $username;
    public $email;
    public $password;

    function __construct($u, $e, $p)
    {
        $this->_id = new MongoDB\BSON\ObjectId();
        $this->username = $u;
        $this->email = $e;
        $this->password = $this->HashPassword($p);
    }

    private function HashPassword($passwd) {
        $options = [
            'cost' => 12,
        ];
        return password_hash($passwd, PASSWORD_BCRYPT, $options);
    }

}