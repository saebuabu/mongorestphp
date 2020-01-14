<?php
use MongoDB\BSON;
namespace family;

require 'vendor/autoload.php';

class Wannabe {
    public $_id;
    public $name;
    public $father;
    public $mother;

    function __construct($name, $father, $mother)
    {
        $this->_id = new ObjectId();
        $this->name = $name;
        $this->father = $father;
        $this->mother = $mother;
    }

}