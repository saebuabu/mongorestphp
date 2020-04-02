<?php
require 'vendor/autoload.php';

class Checkin
{
    public $_id;
    public $group;
    public $bar;
    public $dweller;
    public $latitude;
    public $longitude;
    public $checkInTime;
    public $checkOutTime;

    public $requiredFields = ["group","bar","dweller"];

    function __construct($g, $b, $d, $lat, $lon)
    {
        $this->_id = new MongoDB\BSON\ObjectId();
        $this->group = $g;
        $this->bar = $b;
        $this->dweller = $d;
        $this->latitude = $lat;
        $this->longitude = $lon;
    }

    function CheckIn() {
        $this->checkInTime = strtotime("now");
    }

    function CheckOut() {
        $this->checkOutTime = strtotime("now");
    }

}