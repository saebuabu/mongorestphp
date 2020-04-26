<?php

require 'vendor/autoload.php';

class WannabeModel {
    public $_id;
    public $name;
    public $father;
    public $mother;
    public $email;

    public $requiredFields = ["name","father","mother","email"];

    function __construct($name, $father, $mother, $email)
    {
        $this->_id = new MongoDB\BSON\ObjectId();
        $this->name = $name;
        $this->father = $father;
        $this->mother = $mother;
        $this->email = $email;
    }

}