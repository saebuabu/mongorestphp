<?php

class Wannabe {
    public $_id;
    public $name;
    public $father;
    public $mother;

    function __construct($name, $father, $mother)
    {
        $this->name = $name;
        $this->father = $father;
        $this->mother = $mother;
    }

}