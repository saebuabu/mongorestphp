<?php
/*************
 * bestand : checkin.php
 * auteur  : Abu
 * datum   : 10-3-2020 14:56
 **************/
require "corsheaders.php";
require 'classes/CheckinClient.php';
require 'classes/JsonIO.php';

// get posted data, WERKT NIET
// $data = json_decode(file_get_contents("php://input"));

// connectie naar database, collectie
$fmember = new CheckinClient('wtfaq', 'checkins');

$result = $fmember->AllCheckins($_GET['g'], $_POST['bar']);

JsonIO::WriteOk($result);
